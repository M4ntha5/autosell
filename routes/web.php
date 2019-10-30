<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/ads', function () {
    return view('ads.index');
});
Route::get('/ads/{ad}', function () {
    return view('ads.show');
});

Route::get('/orders', function () {
    return view('orders.index');
});
Route::get('/orders/{order}', function () {
    return view('orders.show');
});

Route::get('/users', function () {
    return view('users.index');
});
Route::get('/users/{user}', function () {
    return view('users.show');
});
