@extends('admin.layout')

@section('content')

<h2 class="mb-4">Sửa sản phẩm</h2>

<form action="/admin/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Tên sản phẩm</label>
<input type="text" name="name" class="form-control" value="{{ $product->name }}">
</div>

<div class="mb-3">
<label class="form-label">Giá</label>
<input type="number" name="price" class="form-control" value="{{ $product->price }}">
</div>

<div class="mb-3">
<label class="form-label">Tồn kho</label>
<input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
</div>

<div class="mb-3">
<label class="form-label">Danh mục</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}"
@if($product->category_id == $category->id) selected @endif
>
{{ $category->name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label class="form-label">Ảnh sản phẩm</label>

@if($product->image)

<img src="/products/{{ $product->image }}" width="120" class="mb-2">

@endif

<input type="file" name="image" class="form-control">

</div>
<button class="btn btn-success">Cập nhật</button>

<a href="/admin/products" class="btn btn-secondary">Quay lại</a>

</form>

@endsection