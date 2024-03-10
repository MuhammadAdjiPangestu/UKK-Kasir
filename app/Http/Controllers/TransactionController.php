<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\TransactionController;
// use App\Models\detail_transaksi;
use App\Models\Bukti_pembayaran;
use App\Models\Order;



class TransactionController extends Controller
{
    public function index(){
        $details = Bukti_pembayaran::all();
        return view('minuman.transaction', compact('details'));
    }

public function testPDF(int $id)
{
    // Retrieve transaction details
    $detail = Order::where('id', $id)->get();
    $pdf = PDF::loadView('minuman.pdftest', compact('detail'));
    return $pdf->download('transaction_report.pdf');

}

}

