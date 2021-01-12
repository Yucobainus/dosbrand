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

Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('admin', 'App\Http\Controllers\HomeController@showAdmin')->name('admin');

Route::get('product/{id}', 'App\Http\Controllers\HomeController@showProduct')->name('show-product');

Route::get('add-product', 'App\Http\Controllers\productController@productForm')->name('add-product');
Route::post('add-product', 'App\Http\Controllers\productController@addProduct')->name('add');

Route::get('add-promo', 'App\Http\Controllers\productController@promoForm')->name('promo');
Route::post('add-promo', 'App\Http\Controllers\productController@addPromo')->name('add-promo');


/*Изменение продуктов*/

Route::get('admin/product-list', 'App\Http\Controllers\productController@showProductList')->name('product-list');
Route::get('admin/delete/{id}', 'App\Http\Controllers\productController@productDelete')->name('product-delete');
Route::get('admin/update/{id}', 'App\Http\Controllers\productController@productUpdate')->name('product-update');
Route::post('admin/update/{id}', 'App\Http\Controllers\productController@updatePr')->name('update-one-product');

/*Добавление в корзину*/

Route::post('product/' , 'App\Http\Controllers\productController@addToCart')->name('add-to-cart');
Route::post('send-email', 'App\Http\Controllers\productController@confirmOrder')->name('confirm-order');

Route::post('edit-posts', 'App\Http\Controllers\productController@confirmOrder')->name('edit-post');


Route::get('aut', 'App\Http\Controllers\HomeController@showAut')->name('show-aut');
Route::post('aut', 'App\Http\Controllers\HomeController@adminAut')->name('aut');

Route::get('success', function (){
   return view('block.confirm');
});
