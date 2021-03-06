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

Auth::routes();

Route::get('/', 'HomeController@show')->name('home');
Route::get('/about-us', 'HomeController@aboutUs')->name('about_us');
Route::get('/product/{id}', 'HomeController@showProduct')->name('product.show');
Route::get('/delivery-types', 'HomeController@deliveriesAndPayments')->name('delivery_and_payments');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');

Route::get('/add-to-cart', 'CheckoutController@addToCart')->name('add_to_cart')->middleware('auth');
Route::get('/clear-cart', 'CheckoutController@clearCart')->name('clear_cart')->middleware('auth');
Route::get('/checkout', 'CheckoutController@form')->name('make_order_form')->middleware('auth');
Route::post('/checkout', 'CheckoutController@makeOrder')->name('make_order')->middleware('auth');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/me', 'DashboardController@me')->name('dashboard-me');
    Route::post('/me', 'DashboardController@update')->name('dashboard-update-me');
    Route::get('/orders', 'DashboardController@orders')->name('dashboard-my-orders');
    Route::get('/order/{id}', 'DashboardController@orderDetails')->name('dashboard.order_details');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.panel');

    Route::prefix('products')->group(function () {
        Route::get('/', 'Admin\ProductsController@listView')->name('admin.products_list');
        Route::get('/create/form', 'Admin\ProductsController@createForm')->name('admin.create_products_form');
        Route::post('/create', 'Admin\ProductsController@create')->name('admin.products_create');
        Route::get('/update/form/{id}', 'Admin\ProductsController@updateForm')->name('admin.update_products_form');
        Route::post('/update/{id}', 'Admin\ProductsController@update')->name('admin.products_update');
        Route::get('/delete/{id}', 'Admin\ProductsController@delete')->name('admin.products_delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', 'Admin\UsersController@listView')->name('admin.users_list');
//        Route::get('/create/form', 'Admin\UsersController@createForm')->name('admin.create_users_form');
//        Route::post('/create', 'Admin\UsersController@create')->name('admin.users_create');
        Route::get('/update/form/{id}', 'Admin\UsersController@updateForm')->name('admin.update_users_form');
        Route::post('/update/{id}', 'Admin\UsersController@update')->name('admin.users_update');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', 'Admin\OrdersController@listView')->name('admin.orders_list');
        Route::get('/{id}', 'Admin\OrdersController@orderDetails')->name('admin.order_details');
        Route::get('/delete/{id}', 'Admin\OrdersController@orderDelete')->name('admin.order_delete');
        Route::get('/update/form/{id}', 'Admin\OrdersController@updateForm')->name('admin.update_orders_form');
        Route::post('/update/{id}', 'Admin\OrdersController@update')->name('admin.orders_update');
    });
});
