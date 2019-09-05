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


//JWT auth

Route::post('signup', 'JWTAuthController@register');
Route::post('login', 'JWTAuthController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('auth', 'JWTAuthController@user');
    Route::post('logout', 'JWTAuthController@logout');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'JWTAuthController@refresh');
