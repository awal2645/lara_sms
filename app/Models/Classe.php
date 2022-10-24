<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table='classes';
    protected $fillable = [
        'class_name', 'class_fees',
    ];
// one to one relation section model
    public function my_section()
    {
        return $this->belongsTo('App\Models\Section');
    }
}
