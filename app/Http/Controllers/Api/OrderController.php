<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function getUserOrders($userId)
    {
        $orders = Order::where('user_id', $userId)->get();
        return response()->json($orders, 200);
    }

    public function getOrderProducts($orderId)
    {
        //dd($orderId);
        $products = DB::table('order')
            ->join('cart', 'order.cart_id', '=', 'cart.cart_id')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
            ->where('order.order_id', $orderId)
            ->select('product.product_id', 'product.product_name', 'product.product_description', 'product.product_price', 'product.product_image', 'cart.total_quantity')
            ->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this order'], 404);
        }

        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $order = new Order;

        $order->cart_id = $request->cart_id;
        $order->user_id = $request->user_id;
        $order->total_amount = $request->total_amount;
        $order->order_date = now();

        $order->save();

        $cart = Cart::where('cart_id', $request->cart_id)->first();

        $cart->status = 'ordered';
        $cart->save();


        return response()->json(['success' => 'Order Received Successfully']);
    }
}
