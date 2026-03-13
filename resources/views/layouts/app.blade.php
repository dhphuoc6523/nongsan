<!DOCTYPE html>
<html>

<head>

<title>Nông sản</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>


body{
background:#f5f5f5;
}


.category-card{

padding:20px;
border-radius:12px;
color:white;
text-align:center;
font-weight:600;
transition:0.3s;
cursor:pointer;

}

.category-card:hover{

transform:translateY(-5px) scale(1.05);
box-shadow:0 10px 20px rgba(0,0,0,0.2);

}

.category-icon{

font-size:35px;
margin-bottom:8px;

}

.category-list{
    display:flex;
    overflow-x:auto;
    padding:1rem 0;
    gap:1rem;
}
.category-list::-webkit-scrollbar{
    height:6px;
}
.category-list::-webkit-scrollbar-track{
    background:transparent;
}
.category-list::-webkit-scrollbar-thumb{
    background:rgba(0,0,0,0.2);
    border-radius:3px;
}

/* category cards in horizontal slider */
.category-list .category-card{
    min-width:160px;
    flex-shrink:0;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    padding:1rem;
    color:#fff;
    text-decoration:none;
}

.category-card{

padding:20px;
border-radius:12px;
color:white;
text-align:center;
font-weight:600;
transition:0.3s;
cursor:pointer;

}

.product-card img{
width:100%;
aspect-ratio:1/1;
object-fit:cover;
}
/* css card đều */
.product-card{
height:100%;
display:flex;
flex-direction:column;
border:none;
border-radius:12px;
overflow:hidden;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
transition:0.3s;
}

.product-card:hover{
transform:translateY(-5px);
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.product-card .card-body{
flex:1;
display:flex;
flex-direction:column;
}

.product-card .price{
margin-top:auto;
}

.product-card .btn{
margin-top:10px;
}



.product-card .card-img-top{
width:100%;
height:200px;
object-fit:cover;
display:block;
}

.product-card h6{
height:48px;
overflow:hidden;
display:-webkit-box;
-webkit-line-clamp:2;
-webkit-box-orient:vertical;
}

/* arrows for horizontal sliders */
.slider-wrapper{position:relative;}
.slider-arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:rgba(255,255,255,0.7);
    border-radius:50%;
    width:32px;
    height:32px;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    z-index:1;
}
.slider-arrow.left{left:0;}
.slider-arrow.right{right:0;}
.slider-arrow:hover{background:rgba(255,255,255,0.9);}

.card-body h6{
min-height:48px;
}

/* css chi tiết sản phẩm */
.product-image-box{
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.product-image{
width:100%;
height:380px;
object-fit:cover;
border-radius:8px;
}

.price{
font-size:28px;
font-weight:bold;
color:#16a34a;
}

.quantity-box{
margin:20px 0;
display:flex;
align-items:center;
gap:15px;
}

.quantity-input{
width:100px;
}

.action-buttons{
display:flex;
gap:15px;
margin-top:20px;
}

.btn-success{
background:#22c55e;
border:none;
padding:10px 25px;
}

.btn-success:hover{
background:#16a34a;
}

/* css giỏ hàng */
table img{
border-radius:6px;
}

.table td{
vertical-align:middle;
}

.btn-success{
background:#22c55e;
border:none;
}

.btn-success:hover{
background:#16a34a;
}

.btn-danger{
background:#ef4444;
border:none;
}

/*css trang thanh toán */
.card{
border-radius:10px;
box-shadow:0 4px 15px rgba(0,0,0,0.08);
border:none;
}

.btn-success{
background:#22c55e;
border:none;
}

.btn-success:hover{
background:#16a34a;
}

input{
border-radius:6px;
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('.slider-wrapper').forEach(wrapper => {
            const list = wrapper.querySelector('.category-list');
            const left = wrapper.querySelector('.slider-arrow.left');
            const right = wrapper.querySelector('.slider-arrow.right');
            if(left){
                left.addEventListener('click', ()=>{ list.scrollBy({left:-200, behavior:'smooth'}); });
            }
            if(right){
                right.addEventListener('click', ()=>{ list.scrollBy({left:200, behavior:'smooth'}); });
            }
        });
    });
</script>

</head>

<body>

<!-- HEADER -->

@if(session('success'))

<div class="container mt-3">

<div class="alert alert-success alert-dismissible fade show" role="alert">

{{ session('success') }}

<button type="button" class="btn-close" data-bs-dismiss="alert"></button>

</div>

</div>

@endif

@if(session('success'))
<div class="container mt-3">
<div class="alert alert-success">
{{ session('success') }}
</div>
</div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
<div class="container">

<a class="navbar-brand fw-bold text-success" href="/">
Nông sản
</a>

<form action="/search" method="GET" class="d-flex">
<input 
type="text" 
name="keyword" 
class="form-control"
placeholder="Nhập tên sản phẩm "
>
<button class="btn btn-success">🔍</button>
</form>

<div class="d-flex align-items-center gap-3">

<a href="/cart" class="position-relative">

🛒

@php
$cartCount = 0;

if(session('cart')){
foreach(session('cart') as $item){
$cartCount += $item['quantity'];
}
}
@endphp

@if($cartCount > 0)

<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
{{ $cartCount }}
</span>

@endif

</a>

@auth

@if(Auth::user()->role == 'admin')

<a href="/admin" class="btn btn-dark btn-sm">
Quản trị
</a>

@endif

<a href="/my-orders" class="btn btn-outline-primary btn-sm">
Đơn hàng của tôi
</a>

<form action="/logout" method="POST">
@csrf
<button class="btn btn-danger btn-sm">
Đăng xuất
</button>
</form>

@endauth

@guest

<a href="/login" class="btn btn-success btn-sm">
Đăng nhập
</a>

@endguest

</div>

</div>
</nav>


<!-- CONTENT -->

<div class="container mt-4">

@yield('content')

</div>


<!-- FOOTER -->

<footer class="bg-dark text-white text-center p-3 mt-5">

© 2026 Nông sản design by DHP

</footer>

</body>

</html>