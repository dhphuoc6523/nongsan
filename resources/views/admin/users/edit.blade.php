@extends('admin.layout')

@section('content')

<h3>Sửa người dùng</h3>

<form method="POST" action="/admin/users/{{ $user->id }}">

@csrf
@method('PUT')

<div class="mb-3">
<label>Tên</label>
<input type="text" class="form-control" value="{{ $user->name }}" disabled>
</div>

<div class="mb-3">

<label>Quyền</label>

<select name="role" class="form-control">

<option value="user" {{ $user->role=='user'?'selected':'' }}>
User
</option>

<option value="admin" {{ $user->role=='admin'?'selected':'' }}>
Admin
</option>

</select>

</div>

<div class="mb-3">

<label>Trạng thái</label>

<select name="status" class="form-control">

<option value="active" {{ $user->status=='active'?'selected':'' }}>
Hoạt động
</option>

<option value="locked" {{ $user->status=='locked'?'selected':'' }}>
Khóa
</option>

</select>

</div>

<button class="btn btn-primary">
Cập nhật
</button>

</form>

@endsection