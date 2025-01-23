<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\PaymentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::get('products', [AuthenticationController::class, 'getProducts'])->name('products');
Route::get('get-search-product/{product_name}', [AuthenticationController::class, 'getSearchProduct']);
//Route::get('get-search-product', [AuthenticationController::class, 'getSearchProduct']);



//cart api
Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::get('get-cart-product/{userId}', [CartController::class, 'getCartProducts']);
Route::post('update-cart-product', [CartController::class, 'updateCartProduct']);
Route::post('remove-cart-product', [CartController::class, 'deleteFromCart']);

//order api
Route::get('/user-orders/{userId}', [OrderController::class, 'getUserOrders']);
Route::post('add-order-to-table', [OrderController::class, 'store']);
Route::get('/order-products/{orderId}', [OrderController::class, 'getOrderProducts']);

//contact-us api
Route::post('contactUs', [ContactUsController::class, 'contactUs']);

//Payment api
Route::post('/payment', [PaymentController::class, 'store']);
