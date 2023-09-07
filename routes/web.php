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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'AuthController@index')->name('login.index');
Route::post('/', 'AuthController@login')->name('login.proses');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware('auth:user')->group(function(){
    Route::resource('users', 'UsersController');
    Route::resource('klien', 'KlienController');
    Route::resource('tipepekerjaan', 'TipePekerjaanController');
    Route::resource('pekerjaan', 'PekerjaanController');
    Route::resource('proyek', 'ProyekController');
    Route::resource('penawaranjasa', 'PenawaranJasaController');
    Route::resource('permintaanjasa', 'PermintaanJasaController');
    Route::resource('tagihan', 'TagihanController');
    Route::resource('pembayaran', 'PembayaranController');
    Route::resource('pesanan', 'PesananController');
    Route::resource('perusahaan', 'ReferensiPerusahaan');
    Route::resource('bahasa', 'ReferensiPerusahaan');
});
