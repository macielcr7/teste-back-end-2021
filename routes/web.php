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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'quotes'], function () {    
	Route::resource('quotes', 	Quotes\QuotesController::class, ['except' => ['show', 'destroy'] ]);
	Route::resource('coins', 	Quotes\CoinsController::class, ['only' => ['index'] ]);
});
