<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubjectPage(){
        return view('Backend.subject.addSubject');
    }
    public function addSubject(Request $request){
        $db_name_subject= new Subject();
        $db_name_subject->sub_name=$request->sub_name;
        $db_name_subject->save();
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with('success','Data added Successfully');



    }
}
