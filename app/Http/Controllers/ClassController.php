<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Repositories\ClassRepository;
class ClassController extends Controller
{
    protected $class;
    
    public function __construct(ClassRepository $ClassRepository)
    {
        $this->class=$ClassRepository;
    }
    //view class function
    public function classViewpage()
    {
        $class=$this->class->all();
        return view('Backend.Class.class',with(compact('class')));
    }
    //add class function
    public function addClass(Request $request)
    {
        $request->validate(
            [
                'class_name'=>'required|unique:classes',
                'class_fees'=>'required|integer|min:0',
            ],
            [
                'class_name.required'=>'Name is required',
                'class_fees.required'=>'Fees is required',
                'class_name.unique'=>'This name already exists'
            ]
            );
        $course_insert= $this->class->store();
        $course_insert->class_name=$request->class_name;
        $course_insert->class_fees=$request->class_fees;
        $course_insert->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
    //update class function
    public function updateClass(Request $request)
    {
        $this->class->update()->where('id',$request->up_class_id)->update(
            [
                'class_name'=>$request->up_class_name,
                'class_fees'=>$request->up_class_fees,   
            ]);
        return response()->json([
                    'status'=>'success',
         ]);
    }
    //delete  class function
    public function deleteClass(Request $request)
    {
        $this->class->delete()->find($request->del_class_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
    public function trash()
    {
        $class=Classe::onlyTrashed()->get();
        return view('Backend.trash',with(compact('class')));
    }
    
    public function restore(Request $request){
        Classe::withTrashed()->find($request->del_trash_id)->restore();
        return response()->json([
            'status'=>'success',
        ]);

    }
}
