<?php
namespace App\Repositories;

use App\Models\Blood;
use App\Models\Classe;


class BloodRepository implements MainInterface
{
    public function all(){
        return Blood::all();
    }
    public function store(){
        return new Blood();
    }
    public function update( )
    {
        return new Blood();
    }
    public function delete()
    {
        return new Blood();
    }

}