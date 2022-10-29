<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
class StudentController extends Controller
{
    protected $student,$class;
    public function __construct(StudentRepository $StudentRepository,ClassRepository $ClassRepository)
    {
        $this->student=$StudentRepository;
        $this->class=$ClassRepository;
    }
    public function studentViewPage(){
        $class=$this->class->all();
        $student=$this->student->all();
        return view('Backend.Student.student',['class'=>$class,'student'=>$student]);
    }
}
