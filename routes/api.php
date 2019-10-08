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





Route::group(['middleware' => 'auth:api'], function () {
    Route::get('swipe/{swipe}', 'SwipeController@show');
    Route::post('swipe', 'SwipeController@store');
    Route::put('swipe/{swipe}', 'SwipeController@update');
    Route::delete('swipe/{swipe}', 'SwipeController@delete');
});

Route::get('swipe', 'SwipeController@index');
Auth::guard('api')->user(); // instance of the logged user
Auth::guard('api')->check(); // if a user is authenticated
Auth::guard('api')->id(); // the id of the authenticated user

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
