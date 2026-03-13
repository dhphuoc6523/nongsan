@extends('layouts.app')

@section('content')

<div class="container mt-5">

<div class="row">

<!-- ảnh sản phẩm -->
<div class="col-md-5">
    <div class="product-image-box">
        <img src="{{ asset('storage/'.$product->image) }}" class="product-image">
    </div>
</div>

<!-- thông tin sản phẩm -->
<div class="col-md-7">
    <h2 class="mb-3">{{ $product->name }}</h2>
    <h3 class="price mb-3">{{ number_format($product->price) }}đ</h3>

    <p class="mt-4"><strong>Tồn kho:</strong> {{ $product->stock }} </p>
    <p class="text-muted mt-3">{{ $product->description }}</p>

    <form action="{{ url('cart/add/'.$product->id) }}" method="POST">
        @csrf
        <div class="quantity-box">
            <label>Số lượng:</label>
            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control quantity-input">
        </div>
        <div class="action-buttons">
            <button type="submit" class="btn btn-outline-success">Thêm vào giỏ hàng</button>
        </div>
    </form>

    <form action="/buy-now/{{ $product->id }}" method="POST">
             @csrf   
            <div class="action-buttons">
                <button class="btn btn-danger">
                Mua ngay
                </button>
            </div>
    </form>


</div>



</div>

</div>


<!-- sản phẩm liên quan -->
<hr class="my-5">
<h3 class="mb-4">Sản phẩm liên quan</h3>
<div class="row">
@foreach($relatedProducts as $item)
    <div class="col-md-3 mb-4 d-flex">
        <div class="card product-card w-100">
            <a href="{{ url('product/'.$item->id) }}">
                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top">
            </a>
            <div class="card-body">
                <h6>
                    <a href="{{ url('product/'.$item->id) }}" style="text-decoration:none; color:black">
                        {{ $item->name }}
                    </a>
                </h6>
                <p class="text-success fw-bold">
                    {{ number_format($item->price) }}đ
                </p>
            </div>
        </div>
    </div>
@endforeach
</div>


</div>

@endsection