<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/me', 'DashboardController@me')->name('dashboard-me');
    Route::put('/me', 'DashboardController@update')->name('dashboard-update-me');
    Route::get('/orders', 'DashboardController@orders')->name('dashboard-my-orders');
});
