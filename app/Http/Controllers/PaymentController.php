<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentMethod(Request $request) {
        
        $payment_info = $request->validate([
            'payment_info' => 'required|string'
        ]);

        


    }
}
