<?php
namespace App\Repositories;

use App\Models\Blood;
use App\Models\Classe;
use App\Models\Gender;

class GenderRepository implements MainInterface
{
    public function all(){
        return Gender::all();
    }
    public function store(){
        return new Gender();
    }
    public function update( )
    {
        return new Gender();
    }
    public function delete()
    {
        return new Gender();
    }

}