@extends('admin.layout')

@section('content')

<h2 class="mb-3">Quản lý sản phẩm</h2>

<a href="/admin/products/create" class="btn btn-primary mb-3">Thêm sản phẩm</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Ảnh</th>
<th>Tên</th>
<th>Giá</th>
<th>Tồn kho</th>
<th>Danh mục</th>
<th>Hành động</th>
</tr>

</thead>

<tbody>

@foreach($products as $product)

<tr>

<td>{{ $product->id }}</td>

<td><img src="{{ asset('storage/'.$product->image) }}" width="80"></td>

<td>{{ $product->name }}</td>

<td>{{ $product->price }}</td>

<td>{{ $product->stock }}</td>

<td>{{ $product->category->name }}</td>

<td>

<a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Sửa</a>

<form action="/admin/products/{{ $product->id }}" method="POST" style="display:inline">

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