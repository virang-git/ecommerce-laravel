<?php

// namespace App\Http\Controllers;

// use App\Models\Admin;
// use Illuminate\Http\Request;
// use App\Models\User;

// class AdminController extends Controller
// {
//     public function adminHome($section = null)
//     {

//         switch ($section) {
//             case 'manageproduct':
//                 $user = User::all();
//                 $content = view('product.manageproduct', [
//                     'showusers' => $user
//                 ])->render();
//                 break;

//             case 'managecategory':
//                 $content = view('category.managecategory')->render();
//                 break;

//             case 'manageorder':
//                 $content = view('order.manageorder')->render();
//                 break;

//             case 'managepayment':
//                 $content = view('payment.managepayment')->render();
//                 break;

//             case 'managecontactus':
//                 $content = view('contactus.managecontactus')->render();
//                 break;

//             case 'manageuser':
//                 $content = view('user.manageuser')->render();
//                 break;

//             default:
//                 $content = '';
//         }

//         // Return the admin home view with the content for the selected section
//         return view('adminhome', compact('content'));
//     }
// }
