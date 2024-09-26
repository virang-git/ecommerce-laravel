<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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
}
