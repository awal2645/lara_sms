<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
class PdfController extends Controller
{
    public function generate_pdf()
    {
        $data="৳";
        $pdf = Pdf::loadView('billing_invoice',compact('data'));
        return $pdf->stream('billing_invoice.pdf');
    }

    // public function download_pdf()
    // {
    //     $data = 'webjourney.dev';
    //     $pdf = Pdf::loadView('billing_invoice',compact('data'));
    //     return $pdf->download('billing-invoice.pdf');
    // }
}
