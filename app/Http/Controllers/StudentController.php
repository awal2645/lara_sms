<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Gender;
use App\Repositories\ClassRepository;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
class StudentController extends Controller
{
    protected $student,$class,$section;
    public function __construct(StudentRepository $StudentRepository,ClassRepository $ClassRepository,SectionRepository $SectionRepository)
    {
        $this->student=$StudentRepository;
        $this->class=$ClassRepository;
        $this->section=$SectionRepository;
    }
    public function studentViewPage(){
        $class=$this->class->all();
        $student=$this->student->all();
        $section=$this->section->all();
        $blood=Blood::all();
        $gender=Gender::all();
        return view('Backend.Student.student',['class'=>$class,'student'=>$student,'blood'=>$blood,'gender'=>$gender,'section'=>$section]);
    }
}
