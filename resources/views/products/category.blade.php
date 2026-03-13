@extends('layouts.app')

@section('content')

<h2 class="mb-4">

Danh mục: {{ $category->name }}

</h2>

{{-- category slider --}}
@php
    $icons = [
        'Rau củ' => '🥬',
        'Trái cây' => '🍎',
        'Mật ong' => '🍯',
        'Bổ dưỡng' => '💛',
        'Sản phẩm OCOP' => '⭐'
    ];
    $bgColors = ['#7FC242','#1E9FD8','#5E35B1','#FF5722','#00897B'];
@endphp

<div class="category-list mb-4">
        @foreach($categories as $cat)
            <a href="/category/{{ $cat->id }}" class="category-card"
               style="background: {{ $bgColors[$loop->index % count($bgColors)] }};">
                <div class="category-icon">{{ $icons[$cat->name] ?? '🌾' }}</div>
                <div>{{ $cat->name }}</div>
            </a>
        @endforeach
    </div>

<div class="row">

@foreach($products as $product)

<div class="col-md-3 mb-4 d-flex">

<div class="card product-card w-100">

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

<form action="/cart/add/{{ $product->id }}" method="POST">

@csrf

<button class="btn btn-success w-100">

Thêm vào giỏ

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

@endsection