<?php
namespace App\Repositories;
use App\Models\Subject;
class SubjectRepository implements SubjectInterface
{
    public function all(){
        return Subject::all();
    
    }
    public function store(){
        return new Subject();
    }
    // public function update( $request)
    // {
    //     return ;
    // }

}