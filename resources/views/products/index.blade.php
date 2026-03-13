@extends('layouts.app')

@section('content')

<h3 class="mb-3">Danh mục</h3>

@php

$icons = [
'Rau củ' => '🥬',
'Trái cây' => '🍎',
'Mật ong' => '🍯',
'Bổ dưỡng' => '💛',
'Sản phẩm OCOP' => '⭐'
];

$colors = [
'Rau củ'=>'#28a745',
'Trái cây'=>'#ff4001',
'Mật ong'=>'#ffc107',
'Bổ dưỡng'=>'#2e00fa',
'Sản phẩm OCOP'=>'#17a2b8'
];

@endphp

<div class="category-list mb-4">
        @foreach($categories as $category)
            <a href="/category/{{ $category->id }}" class="category-card"
               style="background:{{ $colors[$category->name] ?? '#116d92' }}; text-decoration:none;">
                <div class="category-icon">
                    {{ $icons[$category->name] ?? '🌾' }}
                </div>
                <div>{{ $category->name }}</div>
            </a>
        @endforeach
    </div>

<h2 class="mb-4">Sản phẩm mới nhất</h2>

<div class="row">

@foreach($products as $product)

<div class="col-md-3 mb-4">

<div class="card product-card">

@if($product->image)

<img src="{{ asset('storage/'.$product->image) }}" class="card-img-top">

@endif

<div class="card-body">

<h6>

<a href="/product/{{ $product->id }}">

{{ $product->name }}

</a>

</h6>

<p class="text-danger fw-bold">

{{ number_format($product->price) }} VNĐ

</p>

<form action="{{ url('cart/add/'.$product->id) }}" method="POST">

@csrf

<input type="hidden" name="quantity" value="1">

<button type="submit" class="btn btn-success">
Thêm vào giỏ
</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

<div class="text-center mt-3">

<a href="/products" class="btn btn-success">

Xem tất cả sản phẩm

</a>

</div>

@endsection