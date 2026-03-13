<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/product/{id}', [ProductController::class, 'show']);


Route::get('/category/{id}', [ProductController::class, 'category']);

Route::get('/products', [ProductController::class, 'allProducts']);

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', AdminProductController::class);
    
});

//route tìm kiếm

Route::get('/search', [ProductController::class, 'search']);

// route giỏ hàng
use App\Http\Controllers\CartController;

Route::post('/cart/add/{id}', [CartController::class, 'add']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/cart/remove/{id}', [CartController::class, 'remove']);

//route đơn hàng

Route::get('/checkout', [CartController::class, 'checkout'])->middleware('auth');
Route::post('/order', [CartController::class, 'placeOrder'])->middleware('auth');

//route admin quản lý đơn
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('products', AdminProductController::class);

    Route::get('orders', [OrderController::class,'index']);
    Route::get('orders/{id}', [OrderController::class,'show']);

});

//route dashboard
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->group(function () {

Route::get('/', [AdminController::class,'index']);

});

//route đăng nhập
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

//route admin

use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function(){

    Route::get('/', [AdminController::class,'index']);

    Route::resource('products', AdminProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);

});

//route cập nhật giỏ hàng
Route::post('cart/update/{id}', [CartController::class,'update']);

//route đơn hàng

use App\Http\Controllers\OrderController as UserOrderController ;
Route::get('/my-orders', [UserOrderController::class,'myOrders'])->middleware('auth');

//route chi tiết đơn hàng

Route::get('/orders/{id}',[UserOrderController::class,'show'])->middleware('auth');

// route quản lý người dùng
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function(){

Route::resource('users', UserController::class);

});

//route nút mua
Route::post('/buy-now/{id}', [CartController::class,'buyNow']);