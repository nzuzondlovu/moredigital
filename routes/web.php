<?php

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
    return view('welcome');
});

// BMS / Dashboard

Route::prefix('dashboard')->group(function () {

    Route::get('', 'ProductController@index')->name('dashboard.index');

    Route::get('product/create', 'ProductController@create')->name('product.create');

    Route::post('product', 'ProductController@store')->name('product.store');

    Route::get('product/{id}', 'ProductController@show')->name('product.show');

    Route::get('product/{id}/edit', 'ProductController@edit')->name('product.edit');

    Route::post('product/{id}/update', 'ProductController@update')->name('product.update');

    Route::delete('product/{id}/delete', 'ProductController@destroy')->name('product.destroy');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
