<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())
                ->latest()
                ->get();

        return view('orders.my-orders',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id',$id)
                    ->where('user_id',Auth::id())
                    ->firstOrFail();

        $items = OrderItem::where('order_id',$id)
                    ->with('product')
                    ->get();

        return view('orders.show',compact('order','items'));
    }
}