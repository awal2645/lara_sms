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
        'stu_name', 'stu_email','stu_adm_roll','stu_class_id','stu_birth','stu_age','stu_gender','stu_blood','stu_nationality','stu_address','stu_section','stu_img','stu_admitted_year',
    ];
    
}
