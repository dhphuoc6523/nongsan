@extends('admin.layout')

@section('content')

<h2 class="mb-3">Quản lý danh mục</h2>

<a href="/admin/categories/create" class="btn btn-primary mb-3">Thêm danh mục</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Tên</th>
<th>Mô tả</th>
<th>Hành động</th>
</tr>

</thead>

<tbody>

@foreach($categories as $category)

<tr>

<td>{{ $category->id }}</td>

<td>{{ $category->name }}</td>

<td>{{ $category->description }}</td>

<td>

<a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Sửa</a>

<form action="/admin/categories/{{ $category->id }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">Xóa</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection