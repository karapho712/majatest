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
    return view('welcome');
});

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart/tambah/{id}', 'HomeController@tambahcart')->where("id","[0-9]+");
Route::get('/cart/hapus/{id}', 'HomeController@hapuscart')->where("id","[0-9]+");
Route::get('/cart', 'HomeController@cart');
Route::get('/cart/bayar', 'HomeController@cartbayar');
