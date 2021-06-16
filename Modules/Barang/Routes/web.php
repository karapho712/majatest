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

Route::middleware(['admin'])->prefix('barang')->group(function() {
    Route::get('/', 'BarangController@index');
    Route::get('/create', 'BarangController@create');
    Route::post('/store', 'BarangController@store');
    Route::get('/edit/{id}', 'BarangController@edit');
    Route::put('/update/{id}', 'BarangController@update');
    Route::delete('/delete/{id}', 'BarangController@destroy');
});
