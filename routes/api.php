<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// ad routes
Route::get('ads', 'AdController@index');
Route::get('ads/{ad}', 'AdController@show');
Route::post('ads', 'AdController@store');
Route::put('ads/{ad}', 'AdController@update');
Route::delete('ads/{ad}', 'AdController@destroy');

// comment routes
Route::get('comments', 'CommentController@index');
Route::get('comments/{comment}', 'CommentController@show');
Route::post('comments', 'CommentController@store');
Route::put('comments/{comment}', 'CommentController@update');
Route::delete('comments/{comment}', 'CommentController@destroy');

// order routes
Route::get('orders', 'OrderController@index');
Route::get('orders/{order}', 'OrderController@show');
Route::post('orders', 'OrderController@store');
Route::put('orders/{order}', 'OrderController@update');
Route::delete('orders/{order}', 'OrderController@destroy');


Route::get('/', 'PagesController@index');   //to open main page
Route::get('/about', 'PagesController@about');  //to open about page
