<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->get();
        // $category = Category::select('category_name')->where('category_id', $product)->get();
        return view('product.manageproduct', compact('product'));
    }

    /* 
    add product*/
    public function addproduct()
    {

        $category = Category::all();
        return view('product.addproduct', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // $request->validate([
        //     'product_name' => 'required|max:255',
        //     'product_description' => 'required',
        //     'product_image' => 'required|image',
        //     'product_price' => 'required|numeric',
        //     'product_quantity' => 'required|integer',
        //     'category_id' => 'required'
        // ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('asset/images/product_images', $filename);
            $product->product_image = $filename;
        }

        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('product')->with('success', 'Product Added Sucessfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        return view('product.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'category_id' => 'required'
        ]);

        $product = Product::find($product_id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('asset/images/product_images', $filename);
            $product->product_image = $filename;
        }

        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('product')->with('success', 'Product Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        return redirect()->route('product')->with('success', 'Product Updated Sucessfully');
    }
}
