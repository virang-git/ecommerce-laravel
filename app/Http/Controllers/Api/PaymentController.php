<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'order_id' => $request->order_id,
            'user_id' => $request->user_id,
            'payment_mode' => $request->payment_mode,
            'payment_date' => now(),
        ];

        $payment = Payment::create($data);

        return response()->json([
            'payment' => $payment,
        ], 200);
    }
}
