<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\PaymentRepository;
class PaymentController extends Controller
{
    protected $payment;
    public function __construct(PaymentRepository  $PaymentRepository)
    {
        $this->payment = $PaymentRepository;
    }
    public function paymentViewPage(){
        $class= Classe::all();
        return view('Backend.Payment.payment')->with(['class'=>$class]);
    }

    public function searchFeesByClass(Request $request){
        $res=DB::table('classes')->where('id',$request->stu_class_id)->get()->pluck('class_fees');
        return response()->json(["status"=>"success","class_fees"=>$res], 200);
    }

    public function searchStudentByClass(Request $request){
        $data=DB::table('students')->where('stu_class_id',$request->class_id)->get();
        return response()->json(["data"=>$data]);
    }
   
    public function searchStudentByFess(Request $request){
        $res=DB::table('students')->where('id',$request->student_select_id)->get()->pluck('total_ammount');
        return response()->json(["status"=>"success","total_ammount"=>$res], 200);
    }
    public function studentPayment(Request $request){
        $add_payment= $this->payment->store();
        $add_payment->pay_type=$request->pay_type;
        $add_payment->class_id=$request->class_id;
        $add_payment->pay_amount=$request->pay_amount;
        $add_payment->due_pay_date=$request->due_pay_date;
        $add_payment->pay_date=$request->pay_date;
        $add_payment->student_select_id=$request->student_select_id;
        $add_payment->stu_due_amount=$request->stu_due_amount;
        $add_payment->total_amount=$request->total_amount;
        $add_payment->save();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
