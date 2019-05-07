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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {
    // your routes

		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('/product/add', 'ProductController@add');
		Route::get('/product/{productcode}/edit', 'ProductController@edit');
		Route::get('/product/{productcode}/delete', 'ProductController@delete');
		Route::get('/product/{productcode}/view', 'ProductController@view');
		Route::get('/product', 'ProductController@list');
		Route::post('/product/add', 'ProductController@submit');
		Route::post('/product/{productcode}/edit', 'ProductController@submit');

});
