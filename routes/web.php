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

Route::resource('category', 'Admin\CategoryController')->middleware(['is_admin']);
Route::resource('size', 'Admin\SizeController')->middleware(['is_admin']);
Route::resource('color', 'Admin\ColorController')->middleware(['is_admin']);
Route::resource('company', 'Admin\CompanyController')->middleware(['is_admin']);
Route::resource('product', 'Admin\ProductController')->middleware(['is_admin']);
Route::resource('productGallery', 'Admin\ProductGalleryController')->middleware(['is_admin']);

require __DIR__.'/auth.php';
