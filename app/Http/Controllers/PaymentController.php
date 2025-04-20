<?php

namespace App\Http\Controllers;

use App\Models\QRIS;
use App\Models\QRISZakat;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function infaqBank()
    {
        return view('payment.infaq.paymentBank');
    }
    public function infaqQris()
    {
        $qrises = QRIS::all();
        return view('payment.infaq.paymentQRIS', compact('qrises'));
    }
    public function zakatBank()
    {
        return view('payment.zakat.paymentBank');
    }
    public function zakatQris()
    {
        $qriszakats = QRISZakat::all();
        return view('payment.zakat.paymentQRIS', compact('qriszakats'));
    }
}
