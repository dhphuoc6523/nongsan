@extends('admin.layout')

@section('content')

<h2 class="mb-4">Quản lý người dùng</h2>

<a href="/admin/users/create" class="btn btn-success mb-3">
Tạo người dùng
</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Tên</th>
<th>Email</th>
<th>Quyền</th>
<th>Ngày tạo</th>
<th>Trạng thái</th>
<th>Hành động</th>
</tr>

</thead>

<tbody>

@foreach($users as $user)

<tr>

<td>{{ $user->id }}</td>

<td>{{ $user->name }}</td>

<td>{{ $user->email }}</td>

<td>

@if($user->role == 'admin')
<span class="badge bg-danger">Admin</span>
@else
<span class="badge bg-primary">User</span>
@endif

</td>

<td>{{ $user->created_at->format('d/m/Y') }}</td>


<td>

@if($user->status == 'active')

<span class="badge bg-success">
Hoạt động
</span>

@else

<span class="badge bg-danger">
Bị khóa
</span>

@endif

</td>

<td>

<a href="/admin/users/{{ $user->id }}/edit"
class="btn btn-warning btn-sm">

Sửa

</a>

<form action="/admin/users/{{ $user->id }}"
method="POST"
style="display:inline-block;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Bạn có chắc muốn xóa user?')">

Xóa

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection