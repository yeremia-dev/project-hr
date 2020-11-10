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
    return redirect()->route('admin.dashboard');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['is_admin', 'auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('/kontrak', 'KontrakController');
    Route::resource('/reminder','ReminderController');
    Route::resource('/karyawan', 'KaryawanController');
});

Route::middleware(['is_user', 'auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', 'UserController@index')->name('dashboard');
    Route::resource('/kemajuan', 'KemajuanController');
    Route::get('/progress/{id}', 'UserController@getKemajuan')->name('detail-kemajuan');
    Route::get('/konfirmasi/{id}', 'UserController@konfirmasi')->name('konfirmasi');
});
