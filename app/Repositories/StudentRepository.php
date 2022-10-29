<?php
namespace App\Repositories;

use App\Models\Student;

class StudentRepository implements MainInterface
{
    public function all(){
        return Student::all();
    }
    public function store(){
        return new Student();
    }
    public function update( )
    {
        return new Student();
    }
    public function delete()
    {
        return new Student();
    }

}