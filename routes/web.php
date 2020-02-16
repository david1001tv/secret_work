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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.panel');

    Route::prefix('products')->group(function () {
        Route::get('/', 'Admin\ProductsController@listView')->name('admin.products_list');
        Route::get('/create/form', 'Admin\ProductsController@createForm')->name('admin.create_products_form');
        Route::get('/update/form/{id}', 'Admin\ProductsController@updateForm')->name('admin.update_products_form');
        Route::post('/create', 'Admin\ProductsController@create')->name('admin.products_create');
        Route::post('/update', 'Admin\ProductsController@update')->name('admin.products_update');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', 'Admin\UsersController@listView')->name('admin.users_list');
        Route::get('/create/form', 'Admin\UsersController@createForm')->name('admin.create_users_form');
        Route::get('/update/form/{id}', 'Admin\UsersController@updateForm')->name('admin.update_users_form');
        Route::post('/create', 'Admin\UsersController@create')->name('admin.users_create');
        Route::post('/update', 'Admin\UsersController@update')->name('admin.users_update');
    });
});
