@extends('layouts.app')

@section('content')

<div class="container">

<h3>Đăng nhập</h3>

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="Email" class="form-control mb-2">

<input type="password" name="password" placeholder="Mật khẩu" class="form-control mb-2">

<button class="btn btn-success">Đăng nhập</button>

</form>

<p class="mt-3">

Chưa có tài khoản ?

<a href="/register">Đăng ký</a>

</p>

</div>

@endsection