<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sectionViewPage(){
        $section=Section::all();
        $class= Classe::all();
        return view('Backend.Section.section')->with(['class'=>$class,'section'=>$section]);
    }
      //  add section function
      public function addSection(Request $request){
        $request->validate(
            [
                'section_name'=>'required|unique:sections',
                'class_id'=>'required'
            ],
            [
                'section_name.required'=>'Name is required',
                'class_id.required'=>' Section Name is required', 
            ]
            );
        $add_section= new Section();
        $add_section->section_name=$request->section_name;
        $add_section->class_id=$request->class_id;
        $add_section->save();
        return response()->json([
            'status'=>'success',
        ]);
     }
      //  update  sucject function
      public function updateSection(Request $request){
        Section::where('id',$request->up_section_id)->update(
            [
                'section_name'=>$request->up_section_name,   
            ]);
        return response()->json([
            'status'=>'success',
        ]);
 }
     public function deleteSection(Request $request){
        Section::find($request->del_section_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
