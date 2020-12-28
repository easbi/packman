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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('autocomplete', 'TransaksiController@autocomplete')->name('autocomplete');
Route::get('getDistinctMY', 'TransaksiController@getDistinctMY');
Route::get('transaksis/rekapstatus/{status}', 'TransaksiController@rekapstatus');
Route::resource('transaksis', 'TransaksiController');;

Route::get('/monitoring', 'TransaksiController@monitoring');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
