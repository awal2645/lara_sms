<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubjectPage(){
        $subject=Subject::all();
        return view('Backend.subject.addSubject',compact(with('subject')));
    }
    public function addSubject(Request $request){
        $db_name_subject= new Subject();
        $db_name_subject->sub_name=$request->sub_name;
        $db_name_subject->save();
        return redirect()->back()->with('success','Data added Successfully');
     }
}
