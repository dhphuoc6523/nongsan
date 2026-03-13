@extends('admin.layout')

@section('content')

<h2 class="mb-4">Thêm sản phẩm</h2>

<form action="/admin/products" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label class="form-label">Tên sản phẩm</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Giá</label>
<input type="number" name="price" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Tồn kho</label>
<input type="number" name="stock" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Danh mục</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label class="form-label">Mô tả</label>

<textarea name="description" class="form-control"></textarea>

</div>

<div class="mb-3">

<label class="form-label">Ảnh sản phẩm</label>

<input type="file" name="image" class="form-control">

</div>

<button class="btn btn-success">Thêm sản phẩm</button>

<a href="/admin/products" class="btn btn-secondary">Quay lại</a>

</form>

@endsection