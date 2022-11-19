<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function paymentHistoryViewpage(){
        $pay_history=PaymentHistory::all();
        return view('Backend.Payment.payment_history')->with(['pay_history' => $pay_history]);
    }
}
