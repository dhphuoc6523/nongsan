@extends('layouts.app')

@section('content')

<div class="container">

<h3>Đăng ký</h3>

<form method="POST" action="/register">

@csrf

<input type="text" name="name" placeholder="Tên" class="form-control mb-2">

<input type="email" name="email" placeholder="Email" class="form-control mb-2">

<input type="password" name="password" placeholder="Mật khẩu" class="form-control mb-2">

<button class="btn btn-success">Đăng ký</button>

</form>

<p class="mt-3">

Đã có tài khoản ?

<a href="/login">Đăng nhập</a>

</p>

</div>

@endsection