<?php

namespace App\Http\Controllers;

use App\Repositories\BloodRepository;
use App\Repositories\ClassRepository;
use App\Repositories\GenderRepository;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
class StudentController extends Controller
{
    protected $student,$class,$section,$blood,$gender;
    public function __construct
    (
        StudentRepository $studentRepository,ClassRepository $classRepository,
        SectionRepository $sectionRepository,BloodRepository $bloodRepository,
        GenderRepository $genderRepository,
    )
    {
        $this->student=$studentRepository;
        $this->class=$classRepository;
        $this->section=$sectionRepository;
        $this->blood=$bloodRepository;
        $this->gender=$genderRepository;
    }
    public function studentViewPage(){
        $class=$this->class->all();
        $student=$this->student->all();
        $section=$this->section->all();
        $blood=$this->blood->all();
        $gender=$this->gender->all();
        return view('Backend.Student.student',
        [
            'class'=>$class,'student'=>$student,'blood'=>$blood,'gender'=>$gender,'section'=>$section
        ]);
    }
    public function addStudent(Request $request){
        $request->validate(
            [
                'stu_name'=>'required',
                'stu_email'=>'required|unique:students',
                'stu_phone'=>'required|unique:students',
                'stu_adm_roll'=>'required|unique:students',
                'stu_class_id'=>'required|not_in:0',
                'stu_section'=>'required|not_in:0',
            ],
            [
                'stu_name.required'=>'Name is required',
                'stu_email.required'=>'E-mail already exists',
                'stu_phone.required'=>'Number already exists',
                'stu_adm_roll.required'=>'Roll already exists',
                'stu_class_id.required'=>'Class Name is required',
                'stu_section.required'=>'Section Name is required',
            ]
        );
        $add_student= $this->student->store();
        $add_student->stu_name=$request->stu_name;
        $add_student->stu_email=$request->stu_email;
        $add_student->stu_phone=$request->stu_phone;
        $add_student->stu_adm_roll=$request->stu_adm_roll;
        $add_student->stu_class_id=$request->stu_class_id;
        $add_student->stu_age=$request->stu_age;
        $add_student->stu_gender=$request->stu_gender;
        $add_student->stu_blood=$request->stu_blood;
        $add_student->stu_parents=$request->stu_parents;
        $add_student->stu_address=$request->stu_address;
        $add_student->stu_section=$request->stu_section;
        $add_student->stu_admitted_year=$request->stu_admitted_year;
        $add_student->stu_pay_date=$request->stu_pay_date;
        if($request->hasfile('stu_img')){ 
            $file=$request->file('stu_img');
            $file_ext=$file->getClientOriginalExtension();
            $file_name='stu_img.'.time().'.'.$file_ext;
            $file->move('images/profile' ,$file_name);
            $add_student->stu_img='images/profile'.$file_name ;
        }
        $add_student->save();
        return response()->json([
            'status'=>'success',
        ]);

    }
    //  update  student function
    public function upateStudent(Request $request){
        $this->student->update()->where('id',$request->up_stu_id)->update(
                [
                    'stu_name'=>$request->up_stu_name,
                    'stu_email'=>$request->up_stu_email,
                    'stu_age'=>$request->up_stu_age,
                    'stu_phone'=>$request->up_stu_phone,
                    'stu_address'=>$request->up_stu_address,
                    'stu_admitted_year'=>$request->up_stu_admitted_year,
                ]);
            return response()->json([
                'status'=>'success',
            ]);
     }
        //delete  student function
    public function deleteStudent(Request $request){
        $this->student->delete()->find($request->del_stu_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
