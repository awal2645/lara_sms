<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table='sections';

    protected $fillable = 
    [
        'section_name', 'class_id',
    ];
    // one to one relation 
    public function my_class()
    {
        return $this->hasOne('App\Models\Classe','id', 'class_id');
        
    }
}
