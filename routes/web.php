<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController')->name('home');

Route::post('cart/product/{product}', 'CartController@addProduct')->name('cart.product.add');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::get('cart/clear', 'CartController@clear')->name('cart.clear');

Route::post('order', 'OrderController@store')->name('order.store');
