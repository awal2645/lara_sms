<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\SectionRepository;
use App\Repositories\ClassRepository;

class SectionController extends Controller
{
    protected $section,$class;

    public function __construct(SectionRepository $SectionRepository,ClassRepository $ClassRepository)
    {
        $this->section = $SectionRepository;
        $this->class=$ClassRepository;
    }
    //  view section function
    public function sectionViewPage()
    {
        $section = $this->section->all();
        $class = $this->class->all();
        return view('Backend.Section.section')->with(['class'=>$class,'section'=>$section]);
    }

    //  add section function
      public function addSection(Request $request)
      {
        $request->validate(
            [
                'section_name' => 'required|unique:sections',
                'class_id' => 'required',
            ],
            [
                'section_name.required' => 'Name is required',
                'class_id.required' => ' Section Name is required', 
            ]
            );
        $add_section = $this->section->store();
        $add_section->section_name=$request->section_name;
        $add_section->class_id=$request->class_id;
        $add_section->save();
        return response()->json([
            'status'=>'success',
        ]);
     }

      //  update  section function
      public function updateSection(Request $request)
      {
        $this->section->update()->where('id',$request->up_section_id)->update(
            [
                'section_name'=>$request->up_section_name,   
            ]);
        return response()->json([
            'status'=>'success',
        ]);
 }
 //  delete  section function
     public function deleteSection(Request $request)
     {
        $this->section->delete()->find($request->del_section_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
    
}
