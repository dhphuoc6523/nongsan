<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::latest()->take(4)->get();



        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        return view('products.show', compact('product','relatedProducts'));
    }

    public function category($id)
    {

        $category = Category::findOrFail($id);

        $products = Product::where('category_id', $id)->get();

        $categories = Category::all();

        return view('products.category', compact('products','category','categories'));

    }

    public function allProducts()
    {

        $products = Product::paginate(12);

        $categories = Category::all();

        return view('products.all', compact('products','categories'));

    }

    public function search(Request $request)
    {

        $keyword = $request->keyword;

        $products = Product::where('name','like','%'.$keyword.'%')->paginate(12);

        $categories = Category::all();

        return view('products.all', compact('products','categories'));

    }
}

