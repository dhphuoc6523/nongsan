@extends('admin.layout')

@section('content')

<h3>Chi tiết đơn hàng #{{ $order->id }}</h3>

<div class="card p-3 mb-4">

<p><b>Khách hàng:</b> {{ $order->customer_name }}</p>
<p><b>SĐT:</b> {{ $order->phone }}</p>
<p><b>Địa chỉ:</b> {{ $order->address }}</p>

</div>

<h5>Danh sách sản phẩm</h5>

<table class="table table-bordered">

<tr>
<th>Ảnh</th>
<th>Tên</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Tổng</th>
</tr>

@foreach($order->items as $item)

<tr>

<td width="80">
<img src="{{ asset('storage/'.$item->product->image) }}" width="60">
</td>

<td>{{ $item->product->name }}</td>

<td>{{ number_format($item->price) }}đ</td>

<td>{{ $item->quantity }}</td>

<td>{{ number_format($item->price * $item->quantity) }}đ</td>

</tr>

@endforeach

</table>

<h4 class="text-success">
Tổng tiền: {{ number_format($order->total) }}đ
</h4>

<hr>

<h5>Cập nhật trạng thái</h5>

<form action="/admin/orders/{{ $order->id }}" method="POST">

@csrf
@method('PUT')

<select name="status" class="form-control mb-3">

<option value="Chờ xử lý" {{ $order->status == 'Chờ xử lý' ? 'selected' : '' }}>
Chờ xử lý
</option>

<option value="Đang giao" {{ $order->status == 'Đang giao' ? 'selected' : '' }}>
Đang giao
</option>

<option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>
Hoàn thành
</option>

<option value="Đã hủy" {{ $order->status == 'Đã hủy' ? 'selected' : '' }}>
Đã hủy
</option>

</select>

<button class="btn btn-success">
Cập nhật trạng thái
</button>

</form>

@endsection