<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieComponent;
use App\Http\Controllers\CustomerComponent;
use App\Http\Controllers\FoodComponent;
use App\Http\Controllers\ScreeningRoomComponent;
use App\Http\Controllers\ShowTimeComponent;
use App\Http\Controllers\TicketComponent;
use App\Http\Controllers\UserComponent;

Route::get('/', function () { return view('home'); })->name('home');


Route::resource('movies', MovieComponent::class);
Route::resource('customers', CustomerComponent::class);
Route::resource('foods', FoodComponent::class);
Route::resource('screeningrooms', ScreeningRoomComponent::class);
Route::resource('showtimes', ShowTimeComponent::class);
Route::resource('tickets', TicketComponent::class);
Route::resource('users', UserComponent::class);


