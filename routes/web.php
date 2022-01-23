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

// Route::post('/','OtentikasiController@login')->name('login');
// Route::get('/','OtentikasiController@index')->name('login');

Auth::routes();
// Controller bawaan laravel 
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login')->middleware("guest");
Route::post('/login', 'Auth\LoginController@login')->name('login')->middleware("guest");

// Route::group(['middleware' => 'CekLoginMiddleware'], function () {
// sebelum masuk ke akses aplikasi harus lewat middleware dlu 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('bukutamu','BukutamuController@index')->name('showdata');
    Route::get('bukutamu/create','BukutamuController@create')->name('formcreate');
    Route::get('export','BukutamuController@export')->name('exportdata');
    Route::post('bukutamu/store','BukutamuController@store')->name('datastore');
    Route::delete('bukutamu/delete/{id}','BukutamuController@destroy')->name('datadelete');
    Route::get('bukutamu/{id}/edit','BukutamuController@edit')->name('dataedit');
    Route::patch('bukutamu/{id}','BukutamuController@update')->name('dataupdate');
    Route::get('logout','OtentikasiController@logout')->name('logout');
});

Route::get('/', 'TamuController@index')->name('awal');
Route::get('/tamu', 'TamuController@tampil')->name('awaltambah');
Route::post('/tambahtamu','TamuController@tambah')->name('tambahtamu');

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware("auth");
