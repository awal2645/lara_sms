<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $table='subjects';

    protected $fillable = 
    [
        'sub_name', 'sub_short_name','class_id',
    ];

    public function my_class()
    {
        return $this->hasOne('App\Models\Classe','id', 'class_id');
        
    }
}
