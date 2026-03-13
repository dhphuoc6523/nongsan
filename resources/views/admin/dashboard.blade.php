@extends('admin.layout')

@section('content')

<h2>Dashboard</h2>

<div class="row">

<div class="col-md-4">

<div class="card text-white bg-primary mb-3">

<div class="card-body">

<h5>Tổng sản phẩm</h5>

<h2>{{ $products }}</h2>

</div>

</div>

</div>


<div class="col-md-4">

<div class="card text-white bg-success mb-3">

<div class="card-body">

<h5>Tổng đơn hàng</h5>

<h2>{{ $orders }}</h2>

</div>

</div>

</div>


<div class="col-md-4">

<div class="card text-white bg-warning mb-3">

<div class="card-body">

<h5>Tổng danh mục</h5>

<h2>{{ $categories }}</h2>

</div>

</div>

</div>

</div>

@endsection