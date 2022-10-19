<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function addSubjectPage(){
       
        $subject= Subject::latest()->paginate(100);
        return view('Backend.subject.addSubject',compact(with('subject')));
    }
    public function addSubject(Request $request){
        $request->validate(
            [
                'sub_name'=>'required|unique:subjects'

            ],
            [
                'sub_name.required'=>'Name is  required',
                'sub_name.unique'=>'subject name already exits'
            ]
            );
        $db_name_subject= new Subject();
        $db_name_subject->sub_name=$request->sub_name;
        $db_name_subject->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
     public function updateSubject(Request $request){
        
            Subject::where('id',$request->up_sub_id)->update(
                [
                    'sub_name'=>$request->up_sub_name
                ]);
       
        return response()->json([
            'status'=>'success',
        ]);
     }
}
