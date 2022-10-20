<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    public function courseViewpage(){
        $course=Course::all();
        return view('Backend.course.course',with(compact('course')));
    }
    public function addCourse(Request $request){
        $request->validate(
            [
                'course_name'=>'required|unique:courses',
                'course_price'=>'required'
            ],
            [
                'course_name.required'=>'Name is required',
                'course_price.required'=>'Fees is required',
                'course_name.unique'=>'This name already exists'
            ]
            );
        $course_insert= new Course();
        $course_insert->course_name=$request->course_name;
        $course_insert->course_price=$request->course_price;
        $course_insert->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
    public function updateCourse(Request $request){
        Course::where('id',$request->up_course_id)->update(
            [
                'course_name'=>$request->up_course_name,
                'course_price'=>$request->up_course_price,   
            ]);
        return response()->json([
                    'status'=>'success',
         ]);
    }
    //delete  sucject function
    public function deleteCourse(Request $request){
        Course::find($request->del_course_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
    
}
