@extends('layouts.app')

@section('content')

<div class="container mt-5">

<h2 class="mb-4">🛒 Giỏ hàng</h2>

@if(session('cart'))

<table class="table table-bordered align-middle">

<thead class="table-light">
<tr>
<th>Ảnh</th>
<th>Tên</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Tổng</th>
<th></th>
</tr>
</thead>

<tbody>

@php $total = 0 @endphp

@foreach(session('cart') as $id => $item)

@php
$subtotal = $item['price'] * $item['quantity'];
$total += $subtotal;
@endphp

<tr>

<td style="width:120px">

<img src="{{ asset('storage/'.$item['image']) }}"
style="width:100px;height:80px;object-fit:cover;border-radius:6px">

</td>

<td>{{ $item['name'] }}</td>

<td>{{ number_format($item['price']) }}đ</td>

<td>

<form action="{{ url('cart/update/'.$id) }}" method="POST" style="display:flex;gap:5px;">

@csrf

<button type="submit"
name="quantity"
value="{{ $item['quantity'] - 1 }}"
class="btn btn-secondary btn-sm">

-
</button>

<span style="padding:5px 10px;">
{{ $item['quantity'] }}
</span>

<button type="submit"
name="quantity"
value="{{ $item['quantity'] + 1 }}"
class="btn btn-secondary btn-sm">

+
</button>

</form>

</td>

<td class="text-success fw-bold">

{{ number_format($subtotal) }}đ

</td>

<td>

<a href="{{ url('cart/remove/'.$id) }}"
class="btn btn-danger btn-sm">

X

</a>

</td>

</tr>

@endforeach

</tbody>

</table>


<div class="d-flex justify-content-between align-items-center mt-4">

<h4>Tổng tiền:
<span class="text-success">
{{ number_format($total) }}đ
</span>
</h4>

<a href="{{ url('checkout') }}"
class="btn btn-success btn-lg">

Thanh toán

</a>

</div>

@else

<div class="alert alert-warning">

Giỏ hàng đang trống

</div>

@endif

</div>

@endsection