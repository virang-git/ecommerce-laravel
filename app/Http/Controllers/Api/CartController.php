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
            ->where('status', 'not ordered')
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
        // $cartProducts = Cart::select('product_id')->where('user_id', $userId)->get()->toArray();
        // $products = Product::whereIn('product_id', $cartProducts)->get();
        // $total_quantity = Cart::select('cart_id', 'total_quantity')->where('user_id', $userId)->get();
        $cartData = Cart::join('product', 'cart.product_id', '=', 'product.product_id')
            ->select('product.*', 'cart.total_quantity', 'cart.cart_id')
            ->where('cart.user_id', $userId)
            ->where('status', 'not ordered')
            ->get();

        return response()->json([
            'products' => $cartData,
            //'total_quantity' => $total_quantity
        ], 201);
    }

    public function deleteFromCart(Request $request)
    {
        $cartProduct = Cart::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartProduct) {
            $cartProduct->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart',
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in cart',
        ], 404);
    }

    public function updateCartProduct(Request $request)
    {
        $updateQuantity = Cart::where('cart_id', $request->cart_id)
            ->where('product_id', $request->product_id)
            ->update(['total_quantity' => $request->total_quantity]); // Correct format here

        if ($updateQuantity) {
            return response()->json(['status' => 'success', 'message' => 'Cart updated successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to update cart'], 500);
        }
    }
}
