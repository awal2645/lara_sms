<?php
namespace App\Repositories;
use App\Models\Payment;

class PaymentRepository implements MainInterface
{
    public function all(){
        return Payment::all();
    }
    public function store(){
        return new Payment();
    }
    public function update( )
    {
        return new Payment();
    }
    public function delete()
    {
        return new Payment();
    }

}