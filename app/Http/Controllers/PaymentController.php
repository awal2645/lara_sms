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

    public function searchStudentByClass(Request $request){
        $data=DB::table('students')->where('stu_class_id',$request->class_id)->get();
        // $html='<option value="" >Select Class</option>';
        // foreach ($res as $key => $list) {
        //     $html.='<option value="'.$list->id.'" >'.$list->stu_name.'</option>';
        // };
        return response()->json(["data"=>$data]);
    }
}
