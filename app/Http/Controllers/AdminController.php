<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Method to load Manage User content
    public function manageUser()
    {
        $showusers = User::all(); // Assuming you are fetching users from the database
        return view('user.manageuser', compact('showusers'));
    }


    // Method to load Manage Product content
    public function manageProduct()
    {
        $product = Product::with('category')->get();
        // $category = Category::select('category_name')->where('category_id', $product)->get();
        return view('product.manageproduct', compact('product'));
    }

    // Method to load Manage Category
    public function manageCategory()
    {
        $category = Category::all();
        return view(
            'category.managecategory',
            [
                'category' => $category
            ]
        );
    }

    // Add more methods for other pages like Orders, Payments, Contact Us, etc.
    public function manageOrders()
    {
        $order = Order::all();

        return view(
            'order.manageorder',
            compact('order')
        );
    }

    public function allPayments()
    {
        return view('payment.allpayments'); // Load the for All Payments
    }

    public function manageContactUs()
    {
        $contact = ContactUs::all();
        return view(
            'contactus.managecontactus',
            [
                'contact' => $contact
            ]
        );
        return view('contactus.managecontactus'); // Load the for Contact Us Details
    }

    public function count()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();
        $contactUs = ContactUs::count();
        $categoryCount = Category::count();

        $orders = Order::selectRaw('MONTH(order_date) as month, COUNT(*) as count')
            ->groupByRaw('MONTH(order_date)')
            ->get();
        //dd($orders);
        $sales = DB::table('order')
            ->join('cart', 'order.cart_id', '=', 'cart.cart_id') // Join orders with cart
            ->join('product', 'cart.product_id', '=', 'product.product_id') // Join cart with products
            ->selectRaw('product.product_name, SUM(cart.total_quantity) as total_sold') // Aggregate total sold
            ->groupBy('product.product_name') // Group by product name
            ->orderByDesc('total_sold') // Order by highest sold
            // ->limit(5) // Limit to top 5
            ->get();
        return view('dashboard', compact('userCount', 'productCount', 'orderCount', 'contactUs', 'categoryCount', 'orders', 'sales'));
    }
    // public function ordersData()
    // {
    //     $orders = DB::table('order')
    //         ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
    //         ->groupBy('month')
    //         ->get();

    //     return view('adminhome', compact('orders'));
    // }

    // public function salesData()
    // {
    //     $sales = DB::table('order')
    //         ->join('cart', 'order.cart_id', '=', 'cart.cart_id') // Join orders with cart
    //         ->join('product', 'cart.product_id', '=', 'product.product_id') // Join cart with products
    //         ->selectRaw('product.product_name, SUM(cart.total_quantity) as total_sold') // Aggregate total sold
    //         ->groupBy('product.product_name') // Group by product name
    //         ->orderByDesc('total_sold') // Order by highest sold
    //         // ->limit(5) // Limit to top 5
    //         ->get();


    //     return view('adminhome', compact('sales'));
    // }
}
