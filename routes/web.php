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

Route::get('/signup', function () {
    return view('jwt.signup');
});
Route::get('/signin', function () {
    return view('jwt.signin');
})->name('signin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

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
})->middleware('auth');

Route::get('/myorders', function () {
    return view('orders.userOrders');
})->middleware('auth');

Route::get('/orders/{order}', function () {
    return view('orders.show');
})->middleware('auth');

Route::get('/users', function () {
    return view('users.index');
})->middleware('auth');

Route::get('/users/{user}', function () {
    return view('users.show');
})->middleware('auth');
