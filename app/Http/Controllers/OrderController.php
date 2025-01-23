<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::orderBy("order_date", "desc")->paginate(10);
        return view(
            'order.manageorder',
            [
                'order' => $order
            ]
        );
    }
}
