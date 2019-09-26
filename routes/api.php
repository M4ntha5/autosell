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
