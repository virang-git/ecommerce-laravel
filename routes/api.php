<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\CartController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::get('products', [AuthenticationController::class, 'getProducts'])->name('products');


//cart api
Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::get('get-cart-product/{user_id}', [CartController::class, 'getCartProducts']);
Route::get('remove-cart-product/{user_id}', [CartController::class, 'removeCartProduct']);
