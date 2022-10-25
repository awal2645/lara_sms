<?php
namespace App\Repositories;
use App\Models\Subject;
class SubjectRepository implements MainInterface
{
    public function all(){
        return Subject::all();
    }
    public function store(){
        return new Subject();
    }
    public function update( )
    {
        return new Subject();
    }
    public function delete()
    {
        return new Subject();
    }

}