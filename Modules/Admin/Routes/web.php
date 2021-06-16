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

Route::middleware(['admin'])->prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::get('/user', 'AdminController@lihatuser');
    Route::get('/user/create', 'AdminController@createuser');
    Route::post('/user/store', 'AdminController@storeuser');
    Route::get('/user/edit/{id}', 'AdminController@edituser');
    Route::put('/user/update/{id}', 'AdminController@updateuser');
    Route::delete('/user/delete/{id}', 'AdminController@deleteuser');
    Route::get('/detail/{id}', 'AdminController@detailuser');
});
