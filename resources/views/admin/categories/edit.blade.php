@extends('admin.layout')

@section('content')

<h2 class="mb-4">Sửa danh mục</h2>

<form action="/admin/categories/{{ $category->id }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label class="form-label">Tên danh mục</label>

<input type="text"
name="name"
class="form-control"
value="{{ $category->name }}">

</div>

<div class="mb-3">

<label class="form-label">Mô tả</label>

<textarea name="description"
class="form-control">{{ $category->description }}</textarea>

</div>

<button class="btn btn-success">Cập nhật</button>

<a href="/admin/categories" class="btn btn-secondary">Quay lại</a>

</form>

@endsection