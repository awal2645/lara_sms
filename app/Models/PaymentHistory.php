<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    public function my_student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'pay_stu_id');
    }
}
