<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Mail\WelcomeMail;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $formData = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'mobileno' => $request->mobileno,
            'password' => $request->password,
        ];

        $formData['password'] = bcrypt($request->password);

        $user = User::create($formData);

        Mail::to($user->email)->send(new WelcomeMail($user));
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('passportToken')->accessToken
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('passportToken')->accessToken;

            return response()->json([
                'user' => Auth::user(),
                'token' => $token
            ], 200);
        }

        return response()->json([
            'error' => 'Unauthorised'

        ], 401);
    }

    public function getProducts(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }

    // public function getSearchProduct(Request $request)
    // {
    //     $search_products = Product::where('name', 'like', '%' . $request->product_name . '%')->get();
    //     return response()->json($search_products);
    // }
    public function getSearchProduct($product_name)
    {
        //$product_name = $request->input('product_name', ''); // Default to empty string if not provided

        $search_products = Product::where('product_name', 'like', '%' .  $product_name . '%')->get();

        return response()->json([
            'success' => true,
            $search_products,
            'message' => $search_products->isEmpty() ? 'No products found.' : 'Products retrieved successfully.',
        ]);
    }
}
