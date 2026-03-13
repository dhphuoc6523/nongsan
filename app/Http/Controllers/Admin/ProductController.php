<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('products','public');

        }

        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$imagePath
        ]);

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

            $imageName = $product->image;

                    if ($request->hasFile('image')) {

                        $imageName = $request->file('image')->store('products','public');

                    }

        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$imageName
        ]);

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);

        return redirect()->route('products.index');
    }
}
