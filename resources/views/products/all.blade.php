@extends('layouts.app')

@section('content')

<h3 class="mb-4">Tất cả sản phẩm</h3>

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

<div class="mt-4">

{{ $products->links() }}

</div>

@endsection