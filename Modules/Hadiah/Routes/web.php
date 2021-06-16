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

Route::middleware(['admin'])->prefix('hadiah')->group(function() {
    Route::get('/', 'HadiahController@index');
    Route::get('/create', 'HadiahController@create');
    Route::post('/store', 'HadiahController@store');
    Route::get('/edit/{id}', 'HadiahController@edit');
    Route::put('/update/{id}', 'HadiahController@update');
    Route::delete('/delete/{id}', 'HadiahController@destroy');
});
