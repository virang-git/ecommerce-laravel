<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;



//admin home route
Route::get('/', function () {
    return view('adminhome');
});
//Route::get('/', [AdminController::class, 'adminHome']);

//Route::get('/adminhome/{section?}', [AdminController::class, 'adminHome']);

//manager user route

//Route::get('/manageuser', [UserController::class, 'index'])->name('showuser');

Route::get('/deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');


//manage product route
//Route::get('/manageproduct', [ProductController::class, 'index'])->name('product');

Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');

Route::post('/storeproduct', [ProductController::class, 'store'])->name('storeproduct');

Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
Route::put('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateproduct');

Route::get('/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('deleteproduct');


//manage category route
//Route::get('/managecategory', [CategoryController::class, 'index'])->name('category');

Route::get('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory');

Route::post('/storecategory', [CategoryController::class, 'store'])->name('storecategory');

Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
Route::put('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');

Route::get('/deletecategory/{id}', [CategoryController::class, 'destroy'])->name('deletecategory');

//manage order route
//Route::get('/manageorder', [OrderController::class, 'index'])->name('order');

//all payments route
// Route::get('/allpayments', function () {
//     return view('payment.allpayments');
// });

// //manage contact us route
// Route::get('/managecontactus', function () {
//     return view('contactus.managecontactus');
// });

Route::get('manageuser', [AdminController::class, 'manageUser'])->name('manageuser');
Route::get('manageproduct', [AdminController::class, 'manageProduct'])->name('product');
Route::get('managecategory', [AdminController::class, 'manageCategory'])->name('category');
Route::get('manageorder', [AdminController::class, 'manageOrders']);
Route::get('allpayments', [AdminController::class, 'allPayments']);
Route::get('managecontactus', [AdminController::class, 'manageContactUs']);
Route::get('dashboard', [AdminController::class, 'count']);
