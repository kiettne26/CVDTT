<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CustomerComponent;
use App\Http\Controllers\UserComponent;
use App\Http\Controllers\AuthController;

// Trang chủ chuyển về form đăng nhập (có thể bỏ, nếu muốn trang chủ là /login thì xóa route này)
Route::get('/', function () {
    return redirect()->route('login');
});

// Hiển thị form đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Hiển thị form đăng ký (tuỳ bạn có muốn tách view riêng cho đăng ký không)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Xử lý đăng ký
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Trang home cho "kiet@gmail.com"
Route::get('/home', function () {
    return view('home');
})->name('home');

// Trang Trangchu.index cho "user@gmail.com"
Route::get('/trangchu', function () {
    return view('trangchu.index');
})->name('Trangchu.index');

// Resource routes
Route::resource('movies', MovieController::class);
Route::resource('users', UserComponent::class);
