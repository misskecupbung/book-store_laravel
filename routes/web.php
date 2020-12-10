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

Route::get('/', 'BerandaController@welcome');

Route::get('/about', 'BerandaController@about');

Route::get('/help', 'BerandaController@help');
Route::get('/daftar-buku', 'BerandaController@daftarbuku');

Route::get('/buku', 'BukuController@index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
Route::get('/buku/search', 'BukuController@search')->name('buku.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
