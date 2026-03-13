@extends('layouts.app')

@section('content')

<div class="container mt-5">

<h2 class="mb-4">Thanh toán</h2>

<div class="row">

<!-- thông tin khách hàng -->

<div class="col-md-7">

<div class="card p-4">

<h4 class="mb-3">Thông tin khách hàng</h4>

<form action="{{ url('/order') }}" method="POST">

@csrf

<div class="mb-3">
<label>Tên</label>
<input type="text" name="customer_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Số điện thoại</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Địa chỉ</label>
<input type="text" name="address" class="form-control" required>
</div>

<button class="btn btn-success btn-lg w-100">
Đặt hàng
</button>

</form>

</div>

</div>


<!-- đơn hàng -->


<div class="col-md-5">

<div class="card p-4">

<h4 class="mb-3">Đơn hàng của bạn</h4>

@php
$cart = session('cart');
@endphp

@foreach($cart as $item)

<p>{{ $item['name'] }}</p>
<p>{{ number_format($item['price']) }} VNĐ</p>

@endforeach

@php $total = 0 @endphp

@foreach(session('cart') as $item)

@php
$subtotal = $item['price'] * $item['quantity'];
$total += $subtotal;
@endphp

<div class="d-flex justify-content-between mb-2">

<span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>

<span>{{ number_format($subtotal) }}đ</span>

</div>

@endforeach

<hr>

<h5 class="d-flex justify-content-between">

<span>Tổng tiền</span>

<span class="text-success">
{{ number_format($total) }}đ
</span>

</h5>

</div>

</div>

</div>

</div>

@endsection