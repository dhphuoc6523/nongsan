<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $qty = $request->input('quantity',1);   // lấy số lượng từ input

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){

            $cart[$id]['quantity'] += $qty;

        }else{

            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => $qty
            ];

        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success','Đã thêm sản phẩm vào giỏ hàng');
    }
    
    

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        return view('cart.checkout', compact('cart'));
    }


    public function placeOrder(Request $request)
    {

        $cart = session()->get('cart', []);

        if(empty($cart)){
            return redirect('/cart')->with('error','Giỏ hàng trống');
        }

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name'=>$request->customer_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'total'=>$total,
            'status'=>'Chờ xử lý'
        ]);

        foreach($cart as $id => $item){

            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$id,
                'quantity'=>$item['quantity'],
                'price'=>$item['price']
            ]);

        }
       
        session()->forget('cart');

        return redirect('/')->with('success','Đặt hàng thành công!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function buyNow($id)
    {
        $product = Product::findOrFail($id);

        $cart = [];

        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => 1,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect('/checkout');
    }
}