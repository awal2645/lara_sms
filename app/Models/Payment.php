<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable =
    [
        'class_id', 'student_select_id', 'pay_type', 'pay_amount', 'due_pay_date', 'pay_date', 'stu_due_amount', 'total_amount',
    ];
    public function my_class()
    {
        return $this->hasOne('App\Models\Classe', 'id', 'class_id');
    }
    public function my_student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_select_id');
    }
}
