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

	Route::get('/product', 'ProductController@list');
	Route::get('/product/add', 'ProductController@add');
	Route::get('/product/{productcode}/edit', 'ProductController@edit');
	Route::get('/product/{productcode}/delete', 'ProductController@delete');
	Route::get('/product/{productcode}/view', 'ProductController@view');
	Route::post('/product/add', 'ProductController@submit');
	Route::post('/product/{productcode}/edit', 'ProductController@submit');

	Route::get('/product/{productcode}/module/add', 'ModuleController@add');
	Route::get('/product/{productcode}/module/{modulecode}/edit', 'ModuleController@edit');
	Route::get('/product/{productcode}/module/{modulecode}/delete', 'ModuleController@delete');
	Route::get('/product/{productcode}/module/{modulecode}/view', 'ModuleController@view');
	Route::get('/product/{productcode}/module', 'ModuleController@list');
	Route::post('/product/{productcode}/module/add', 'ModuleController@submit');
	Route::post('/product/{productcode}/module/{modulecode}/edit', 'ModuleController@submit');

	Route::get('/user/add', 'UserController@add');
	Route::get('/user/{username}/edit', 'UserController@edit');
	Route::get('/user/{username}/delete', 'UserController@delete');
	Route::get('/user/{username}/view', 'UserController@view');
	Route::get('/user', 'UserController@list');
	Route::post('/user/add', 'UserController@submit');
	Route::post('/user/{username}/edit', 'UserController@submit');

	Route::get('/group/add', 'GroupController@add');
	Route::get('/group/{groupcode}/edit', 'GroupController@edit');
	Route::get('/group/{groupcode}/delete', 'GroupController@delete');
	Route::get('/group/{groupcode}/view', 'GroupController@view');
	Route::get('/group', 'GroupController@list');
	Route::post('/group/add', 'GroupController@submit');
	Route::post('/group/{groupcode}/edit', 'GroupController@submit');

	Route::get('/institution/add', 'InstitutionController@add');
	Route::get('/institution/{institutionid}/edit', 'InstitutionController@edit');
	Route::get('/institution/{institutionid}/delete', 'InstitutionController@delete');
	Route::get('/institution/{institutionid}/view', 'InstitutionController@view');
	Route::get('/institution', 'InstitutionController@list');
	Route::post('/institution/add', 'InstitutionController@submit');
	Route::post('/institution/{institutionid}/edit', 'InstitutionController@submit');
	Route::post('/institution', 'InstitutionController@list');

});