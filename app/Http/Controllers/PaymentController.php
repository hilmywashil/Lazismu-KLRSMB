<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function bank()
    {
        return view('payment.paymentBank');
    }
    public function qris()
    {
        return view('payment.paymentQRIS');
    }
}
