@extends('layouts.app')

@section('content')

<div class="container mt-5">

<h3>Chi tiết đơn hàng #{{ $order->id }}</h3>

<div class="mb-3">
<b>Tên:</b> {{ $order->customer_name }} <br>
<b>SĐT:</b> {{ $order->phone }} <br>
<b>Địa chỉ:</b> {{ $order->address }} <br>
<b>Trạng thái:</b>

<span class="badge bg-warning">
{{ $order->status }}
</span>

</div>

<table class="table table-bordered">

<tr>
<th>Ảnh</th>
<th>Sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Tổng</th>
</tr>

@foreach($items as $item)

<tr>

<td width="100">
<img src="{{ asset('storage/'.$item->product->image) }}" width="80">
</td>

<td>{{ $item->product->name }}</td>

<td>{{ number_format($item->price) }}đ</td>

<td>{{ $item->quantity }}</td>

<td>{{ number_format($item->price * $item->quantity) }}đ</td>

</tr>

@endforeach

</table>

<h4 class="text-success text-end">

Tổng tiền: {{ number_format($order->total) }}đ

</h4>

</div>

@endsection