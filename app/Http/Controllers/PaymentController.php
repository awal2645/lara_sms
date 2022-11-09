<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function paymentViewPage(){
        return view('Backend.Payment.payment');
    }

public function searchFeesByClass(Request $request){
        $res=DB::table('classes')->where('id',$request->stu_class_id)->get()->pluck('class_fees');
        return response()->json(["status"=>"success","class_fees"=>$res], 200);
    }
}
