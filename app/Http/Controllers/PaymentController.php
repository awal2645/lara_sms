<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function paymentViewPage(){
        return view('Backend.Payment.payment');
    }

public function search(Request $request){
        $cid=$request->class_id;
        $student=DB::table('students')->where('stu_class_id',$cid)->get();
        $html='<option value="">Select Student<option>';
        foreach($student as $list){
            $html.='option value=""> '.$list->stu_name.'</option>';
        }

        echo $html;

    }


}
