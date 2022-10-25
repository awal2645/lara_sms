<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use HasFactory;

    use SoftDeletes;

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
