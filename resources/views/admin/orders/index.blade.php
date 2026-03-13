@extends('admin.layout')

@section('content')

<h2 class="mb-3">Quản lý đơn hàng</h2>

<table class="table table-bordered">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Khách hàng</th>
<th>SĐT</th>
<th>Tổng tiền</th>
<th>Trạng thái</th>
<th>Hành động</th>
</tr>
</thead>

<tbody>

@foreach($orders as $order)

<tr>

<td>#{{ $order->id }}</td>

<td>{{ $order->customer_name }}</td>

<td>{{ $order->phone }}</td>

<td>{{ number_format($order->total) }}đ</td>

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

<td>

<a href="/admin/orders/{{ $order->id }}" class="btn btn-info btn-sm">
Chi tiết
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection