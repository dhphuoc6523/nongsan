<!DOCTYPE html>
<html>
<head>

<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container-fluid">

<div class="row">

<!-- Sidebar -->

<div class="col-2 bg-dark text-white min-vh-100 p-3">

<h4>Admin</h4>

<hr>

<ul class="nav flex-column">

<li class="nav-item">
<a class="nav-link text-white" href="/admin">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/admin/products">Sản phẩm</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/admin/categories">Danh mục</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/admin/users">Người dùng</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/admin/orders">Đơn hàng</a>
</li>

</ul>

</div>


<!-- Content -->

<div class="col-10 p-4">

@yield('content')

</div>

</div>

</div>

</body>
</html>