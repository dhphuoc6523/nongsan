@extends('admin.layout')

@section('content')

<h2 class="mb-4">Thêm danh mục</h2>

<form action="/admin/categories" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">Tên danh mục</label>

<input type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Mô tả</label>

<textarea name="description"
class="form-control"></textarea>

</div>

<button class="btn btn-success">Thêm danh mục</button>

<a href="/admin/categories" class="btn btn-secondary">Quay lại</a>

</form>

@endsection