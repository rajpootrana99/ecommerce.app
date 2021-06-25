<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//ForgotController Routes
Route::post('forgot', 'ForgotController@forgot');
Route::post('reset', 'ForgotController@reset');
Route::post('checkToken', 'ForgotController@checkToken');

//AuthController Routes
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('user', 'AuthController@user')->middleware('auth:api');
Route::get('logout', 'AuthController@logout')->middleware('auth:api');
Route::get('index', 'AuthController@index')->middleware('auth:api');
Route::post('update/{user}', 'AuthController@update')->middleware('auth:api');

//Product Controller
Route::get('products', 'ProductController@index');
Route::post('filterProducts', 'ProductController@search');
Route::post('addToFavourite', 'ProductController@addToFavourite')->middleware('auth:api');
Route::get('getFavourite', 'ProductController@getFavourite')->middleware('auth:api');
Route::get('deals', 'DealController@index');
Route::get('categories', 'CategoryController@index');
Route::post('contactus', 'ContactUsController@store');
Route::post('orders', 'OrderController@makeOrder')->middleware('auth:api');
Route::post('address', 'AddressController@store')->middleware('auth:api');
