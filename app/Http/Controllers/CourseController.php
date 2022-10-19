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
                'course_price'=>'required|unique'
            ],
            [
                'course_name.required'=>'Name is required',
                'course_price.required'=>'Price is required',
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
}
