@extends('admin.layout')

@section('content')

<h3>Tạo người dùng</h3>

<form method="POST" action="/admin/users">

@csrf

<div class="mb-3">
<label>Tên</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Mật khẩu</label>
<input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
<label>Quyền</label>

<select name="role" class="form-control">

<option value="user">User</option>
<option value="admin">Admin</option>

</select>

</div>

<button class="btn btn-success">
Tạo tài khoản
</button>

</form>

@endsection