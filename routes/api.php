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
Route::get('ads', 'AdsController@index');
Route::get('ads/{ad}', 'AdsController@show');
Route::post('ads', 'AdsController@store');
Route::put('ads/{ad}', 'AdsController@update');
Route::delete('ads/{ad}', 'AdsController@destroy');


// reik padaryt sudetini api kad butu pvz: api/ads/1/comments

Route::get('ads/{id}/comments', 'CommentsController@index');

// comment routes
Route::get('comments', 'CommentsController@index');
Route::get('comments/{comment}', 'CommentsController@show');
Route::post('comments', 'CommentsController@store');
Route::put('comments/{comment}', 'CommentsController@update');
Route::delete('comments/{comment}', 'CommentsController@destroy');

// order routes
Route::get('orders', 'OrdersController@index');
Route::get('orders/{order}', 'OrdersController@show');
Route::post('orders', 'OrdersController@store');
Route::put('orders/{order}', 'OrdersController@update');
Route::delete('orders/{order}', 'OrdersController@destroy');

Route::fallback(function(){
  return response()->json([
    'message'=>'Page not found'], 404);
});
