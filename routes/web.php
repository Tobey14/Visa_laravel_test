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

Route::get('/login', 'HomeController@login')->name('login');
Route::post('/authenticate', 'HomeController@authenticate')->name('authenticate');

Route::post('/userStore', 'UserController@store')->name('userStore');

Route::get('/register', 'HomeController@register')->name('register');


Route::group(['middleware' => 'auth',], function(){
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::get('/storeTransaction', 'UserController@storeTransaction')->name('store_transaction');
    Route::get('/fund', 'HomeController@fund')->name('fund');
    Route::resource('/transaction', 'TransactionController');
    Route::get('/logout', 'HomeController@logout')->name('logout');
});
