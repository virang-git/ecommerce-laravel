<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class  CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cartProduct = Cart::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartProduct) {
            return response()->json([
                'status' => 'exists',
                'message' => 'Product already exists in cart'
            ], 200);
        }

        $cartData = [
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'total_quantity' => $request->total_quantity,
        ];

        $cart = Cart::create($cartData);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart',
            'cart' => $cart,
        ], 201);
    }

    public function getCartProducts($userId)
    {
        $cartProducts = Cart::select('product_id')->where('user_id', $userId)->get()->toArray();
        $products = Product::whereIn('product_id', $cartProducts)->get();
        $total_quantity = Cart::select('total_quantity')->where('user_id', $userId)->get();
        return response()->json([
            'products' => $products,
            'total_quantity' => $total_quantity
        ], 201);
    }

    public function removeCartProduct($userId)
    {
        $cartProducts = Cart::select('product_id')->where('user_id',$userId)->
    }
}
