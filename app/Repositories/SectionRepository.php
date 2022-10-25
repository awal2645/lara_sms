<?php
namespace App\Repositories;

use App\Models\Section;

class SectionRepository implements MainInterface
{
    public function all(){
        return Section::all();
    }
    public function store(){
        return new Section();
    }
    public function update( )
    {
        return new Section();
    }
    public function delete()
    {
        return new Section();
    }

}