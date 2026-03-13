@extends('layouts.app')

@section('content')

<div class="container mt-5">

<h2 class="mb-4">Đơn hàng của tôi</h2>

<table class="table table-bordered">

<thead>
<tr>
<th>Mã đơn</th>
<th>Tên</th>
<th>SĐT</th>
<th>Địa chỉ</th>
<th>Tổng tiền</th>
<th>Trạng thái</th>
<th>Ngày</th>
</tr>
</thead>

<tbody>

@foreach($orders as $order)

<tr>
<td>#{{ $order->id }}</td>
<td>{{ $order->customer_name }}</td>
<td>{{ $order->phone }}</td>
<td>{{ $order->address }}</td>
<td class="text-success">
{{ number_format($order->total) }}đ
</td>
<td>

@if($order->status == 'Chờ xử lý')
<span class="badge bg-warning">Chờ xử lý</span>

@elseif($order->status == 'Đang giao')
<span class="badge bg-primary">Đang giao</span>

@elseif($order->status == 'Hoàn thành')
<span class="badge bg-success">Hoàn thành</span>

@elseif($order->status == 'Đã hủy')
<span class="badge bg-danger">Đã hủy</span>
@endif

</td>
<td>{{ $order->created_at->format('d/m/Y') }}</td>
<td>
<a href="/orders/{{ $order->id }}" class="btn btn-primary btn-sm">
Xem
</a>
</td>
</tr>

@endforeach

</tbody>

</table>

</div>

@endsection