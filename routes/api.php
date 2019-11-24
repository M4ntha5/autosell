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

    //Route::post('login', 'AuthController@login');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');             
    Route::post('payload', 'AuthController@payload');   // ar reikalingas ??
});


// ad routes

Route::get('ads', 'AdsController@index');
Route::get('ads/{ad}', 'AdsController@show');
Route::post('ads', 'AdsController@store');//->middleware('auth.role:admin, user');
Route::put('ads/{ad}', 'AdsController@update');//->middleware('auth.role:admin, user');
Route::delete('ads/{ad}', 'AdsController@destroy');//->middleware('auth.role:admin, user');


// comment routes


Route::get('ads/{ad}/comments', 'CommentsController@index');
Route::get('ads/{ad}/comments/{comment}', 'CommentsController@show');
Route::post('ads/{ad}/comments', 'CommentsController@store');//->middleware('auth.role:admin, user');
Route::put('ads/{ad}/comments/{comment}', 'CommentsController@update');//->middleware('auth.role:admin, user');
Route::delete('ads/{ad}/comments/{comment}', 'CommentsController@destroy');//->middleware('auth.role:admin, user');

// order routes

Route::get('orders', 'OrdersController@index')->middleware('auth.role:admin');
Route::get('ordersall', 'OrdersController@getIndexes')->middleware('auth.role:admin');
Route::get('orders/{order}', 'OrdersController@show')->middleware('auth.role:admin,user');
Route::get('myorders', 'OrdersController@myOrders')->middleware('auth.role:user');
Route::post('orders', 'OrdersController@store')->middleware('auth.role:user');
Route::put('orders/{order}', 'OrdersController@update')->middleware('auth.role:admin,user');
Route::delete('orders/{order}', 'OrdersController@destroy')->middleware('auth.role:admin');

// user routes

Route::get('users', 'UsersController@index')->middleware('auth.role:admin');
Route::get('users/{user}', 'UsersController@show')->middleware('auth.role:admin,user');
//Route::post('users', 'UsersController@store');
Route::put('users/{user}', 'UsersController@update')->middleware('auth.role:admin,user');
Route::delete('users/{users}', 'UsersController@destroy')->middleware('auth.role:admin,user');



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
Route::get('status_types', 'APIController@getStatusTypes');
Route::get('citys', 'APIController@getCitys');
Route::get('countrys', 'APIController@getCountrys');


Route::fallback(function(){
  return response()->json([
    'message'=>'Page not found'], 404);
});
