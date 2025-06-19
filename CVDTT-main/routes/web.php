<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieComponent;
use App\Http\Controllers\CustomerComponent;
use App\Http\Controllers\FoodComponent;
use App\Http\Controllers\ScreeningRoomComponent;
use App\Http\Controllers\ShowTimeComponent;
use App\Http\Controllers\TicketComponent;
use App\Http\Controllers\UserComponent;

// Trang chủ chuyển về movies hoặc dashboard (bạn chọn route tùy ý)
Route::get('/', function () { return view('home'); })->name('home');


// Resource routes cho từng entity
Route::resource('movies', MovieComponent::class);
Route::resource('customers', CustomerComponent::class);
Route::resource('foods', FoodComponent::class);
Route::resource('screeningrooms', ScreeningRoomComponent::class);
Route::resource('showtimes', ShowTimeComponent::class);
Route::resource('tickets', TicketComponent::class);
Route::resource('users', UserComponent::class);


