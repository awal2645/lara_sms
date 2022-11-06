<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';

    protected $fillable = 
    [
        'stu_name', 'stu_email','stu_adm_roll','stu_class_id','stu_age','stu_gender_id','stu_blood_id','stu_parents','stu_address','stu_section','stu_img','stu_admitted_year',
    ];
    public function my_class()
    {
        return $this->hasOne('App\Models\Classe','id', 'stu_class_id');
        
    }
    public function my_section()
    {
        return $this->hasOne('App\Models\Section','id', 'stu_section');
        
    }
}
