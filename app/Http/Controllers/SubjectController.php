<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;
class SubjectController extends Controller
{
    public function addSubjectPage(){
        $subject= Subject::latest()->paginate(100);
        return view('Backend.subject.addSubject',compact(with('subject')));
    }
     //  add sucject function
    public function addSubject(Request $request){
        $request->validate(
            [
                'sub_name'=>'required|unique:subjects'
            ],
            [
                'sub_name.required'=>'Name is required',
                'sub_name.unique'=>'This name already exists '
            ]
            );
        $db_name_subject= new Subject();
        $db_name_subject->sub_name=$request->sub_name;
        $db_name_subject->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
    //  update  sucject function
     public function updateSubject(Request $request){
            Subject::where('id',$request->up_sub_id)->update(
                [
                    'sub_name'=>$request->up_sub_name
                ]);
            return response()->json([
                'status'=>'success',
            ]);
     }
        //delete  sucject function
    public function deleteSubject(Request $request){
        Subject::find($request->del_sub_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
}