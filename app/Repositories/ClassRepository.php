<?php
namespace App\Repositories;

use App\Models\Classe;


class ClassRepository implements MainInterface
{
    public function all(){
        return Classe::all();
    }
    public function store(){
        return new Classe();
    }
    public function update( )
    {
        return new Classe();
    }
    public function delete()
    {
        return new Classe();
    }

}