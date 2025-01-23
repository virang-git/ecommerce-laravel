<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view(
            'category.managecategory',
            [
                'category' => $category
            ]
        );
    }

    /*
    add category page
    */

    public function addcategory()
    {
        return view('category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $category = new Category();

        $category->category_name = $request->category_name;

        $category->save();

        return redirect()->route('category')->with('success', 'Category Inserted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('category.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $category = Category::find($category_id);

        $category->category_name = $request->category_name;

        $category->save();

        return redirect()->route('category')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the category by ID and delete it
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully']);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }
}
