<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

// Route::resource('foods', 'ControllerMakanan');

Route::group(['middleware' => ['auth', 'CekLevel:admin,waiter,kasir,owner']], function () {
    Route::get('/home', 'HomeController@index')->name('index');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::resource('user', 'ControllerUser');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin,waiter']], function () {
    Route::resource('foods', 'ControllerMakanan');
});

Route::group(['middleware' => ['auth', 'CekLevel:kasir']], function () {
    Route::resource('order', 'KasirController');
    Route::get('/invoice', 'KasirController@invoice')->name('invoice');
    Route::get('/invoice/pdf', 'KasirController@pdf')->name('invoicepdf');
});
