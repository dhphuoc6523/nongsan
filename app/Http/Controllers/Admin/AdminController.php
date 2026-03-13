<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;

class AdminController extends Controller
{

    public function index()
    {

        $products = Product::count();

        $orders = Order::count();

        $categories = Category::count();

        return view('admin.dashboard', compact('products','orders','categories'));

    }

}
