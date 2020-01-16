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

Route::resource('transaksis', 'TransaksiController');
Route::get('/monitoring', 'TransaksiController@monitoring');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('autocomplete', 'TransaksiController@autocomplete')->name('autocomplete');
