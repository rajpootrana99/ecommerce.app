<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/index', function () {
    return view('index');
})->middleware(['is_admin'])->name('index');

Route::resource('user', 'Admin\UserController')->middleware(['is_admin']);
Route::resource('category', 'Admin\CategoryController')->middleware(['is_admin']);
Route::resource('size', 'Admin\SizeController')->middleware(['is_admin']);
Route::resource('color', 'Admin\ColorController')->middleware(['is_admin']);
Route::resource('company', 'Admin\CompanyController')->middleware(['is_admin']);
Route::resource('product', 'Admin\ProductController')->middleware(['is_admin']);
Route::patch('product/updatePopular/{product}', 'Admin\ProductController@updatePopular')->name('product.updatePopular')->middleware(['is_admin']);
Route::resource('productGallery', 'Admin\ProductGalleryController')->middleware(['is_admin']);
Route::resource('order', 'Admin\OrderController')->middleware(['is_admin']);
Route::patch('order/updateStatus/{order}', 'Admin\OrderController@updateStatus')->name('order.updateStatus')->middleware(['is_admin']);
Route::resource('contactUs', 'Admin\ContactUsController')->middleware(['is_admin']);
Route::resource('deal', 'Admin\DealController')->middleware(['is_admin']);
Route::resource('notification', 'Admin\NotificationController')->middleware(['is_admin']);

require __DIR__.'/auth.php';
