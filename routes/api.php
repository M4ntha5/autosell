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



Route::group(['prefix' => 'auth'], function () 
{
    Route::post('signin', 'AuthController@signin');
    Route::post('signup', 'AuthController@signup');

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
});


// ad routes
Route::group([], function() 
{
    Route::get('ads', 'AdsController@index');
    Route::get('ads/{ad}', 'AdsController@show');
    Route::post('ads', 'AdsController@store');
    Route::put('ads/{ad}', 'AdsController@update');
    Route::delete('ads/{ad}', 'AdsController@destroy');
}); 

// comment routes
Route::group([], function() 
{
    Route::get('ads/{ad}/comments', 'CommentsController@index');
    Route::get('ads/{ad}/comments/{comment}', 'CommentsController@show');
    Route::post('ads/{ad}/comments', 'CommentsController@store');
    Route::put('ads/{ad}/comments/{comment}', 'CommentsController@update');
    Route::delete('ads/{ad}/comments/{comment}', 'CommentsController@destroy');
});
// order routes
Route::group([], function() 
{
    Route::get('orders', 'OrdersController@index');
    Route::get('orders/{order}', 'OrdersController@show');
    Route::post('orders', 'OrdersController@store');
    Route::put('orders/{order}', 'OrdersController@update');
    Route::delete('orders/{order}', 'OrdersController@destroy');
});
// user routes
Route::group([], function() 
{
    Route::get('users', 'UsersController@index');
    Route::get('users/{user}', 'UsersController@show');
    //Route::post('users', 'UsersController@store');
    Route::put('users/{user}', 'UsersController@update');
    Route::delete('users/{users}', 'UsersController@destroy');
});



Route::get('body_types', 'APIController@getBodyTypes');
Route::get('brands', 'APIController@getBrands');
Route::get('climate_controls', 'APIController@getClimateControls');
Route::get('colors', 'APIController@getColors');
Route::get('damages', 'APIController@getDamages');
Route::get('doors', 'APIController@getDoors');
Route::get('driven_wheels', 'APIController@getDrivenWheels');
Route::get('euro_standard', 'APIController@getEuroStandard');
Route::get('fuel_types', 'APIController@getFuelTypes');
Route::get('gearboxes', 'APIController@getGearboxes');
Route::get('models', 'APIController@getModels');
Route::get('steering_wheels', 'APIController@getSteeringWheels');



Route::fallback(function(){
  return response()->json([
    'message'=>'Page not found'], 404);
});
