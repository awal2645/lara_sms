<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Repositories\Subjectrepository;
class SubjectController extends Controller
{
    protected $data;

    public function __construct(Subjectrepository $Subjectrepository)
    {
        $this->data = $Subjectrepository;   
    }

    public function subjectViewPage(){
        $subject = $this->data->all();
        $class = Classe::all();
        return view('Backend.Subject.subject')->with(['subject'=>$subject, 'class'=>$class]);
    }

     //  add sucject function
    public function addSubject(Request $request){
        $request->validate(
            [
                'sub_name'=>'required|unique:subjects',
                'sub_short_name'=>'required|unique:subjects',
                'class_id'=>'required|not_in:0'
            ],
            [
                'sub_name.required'=>'Name is required',
                'sub_short_name.required'=>'Short name is required',
                'class_id.required'=>'Class Name is required',
                'sub_name.unique'=>'This name already exists '
            ]
        );
        $db_add_subject= $this->data->store();
        $db_add_subject->sub_name=$request->sub_name;
        $db_add_subject->sub_short_name=$request->sub_short_name;
        $db_add_subject->class_id=$request->class_id;
        $db_add_subject->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
    //  update  sucject function
     public function updateSubject(Request $request){
        Subject::where('id',$request->up_sub_id)->update(
                [
                    'sub_name'=>$request->up_sub_name,
                    'sub_short_name'=>$request->up_sub_short_name
                    
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