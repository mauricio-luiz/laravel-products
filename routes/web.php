<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'Auth\LoginController@index'
]);

Route::get('/criar-usuario', [
    'as' => 'user_register', 'uses' => 'Auth\RegisterController@index'
]);

Route::group(array('before' => 'csrf'), function(){
	Route::post('/salvar-usuario', [
    	'as' => 'user_store', 'uses' => 'Auth\RegisterController@store'
	]);
	Route::post('/login', [
    	'as' => 'login', 'uses' => 'Auth\LoginController@login'
	]);
});


Route::group(['middleware' => 'auth.user'], function(){
	Route::get('dashboard', [
		'as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index'
	]);

	Route::get('logout', [
		'as' => 'logout', 'uses' => 'Auth\LoginController@logout'
	]);

	Route::get('categorias', [
		'as' => 'categories', 'uses' => 'Categories\CategoriesController@index'
	]);
	Route::get('categorias/criar', [
		'as' => 'category_create', 'uses' => 'Categories\CategoriesController@create'
	]);
	Route::get('categorias/editar/{category_id}', [
		'as' => 'category_edit', 'uses' => 'Categories\CategoriesController@edit'
	]);
	Route::get('categorias/excluir/{category_id}', [
		'as' => 'category_destroy', 'uses' => 'Categories\CategoriesController@destroy'
	]);

	Route::get('produtos/criar', [
		'as' => 'product_create', 'uses' => 'Products\ProductsController@create'
	]);
	Route::get('produtos/editar/{product_id}', [
		'as' => 'product_edit', 'uses' => 'Products\ProductsController@edit'
	]);
	Route::get('produtos/excluir/{product_id}', [
		'as' => 'product_destroy', 'uses' => 'Products\ProductsController@destroy'
	]);

	Route::get('relatorios/gerar', [
		'as' => 'report_generate', 'uses' => 'Reports\ReportsController@generate'
	]);

	Route::group(array('before' => 'csrf'), function(){

		Route::post('categorias/salvar', [
			'as' => 'category_store', 'uses' => 'Categories\CategoriesController@store'
		]);
		Route::patch('categorias/atualizar/{category_id}', [
			'as' => 'category_update', 'uses' => 'Categories\CategoriesController@update'
		]);

		Route::post('produtos/salvar', [
			'as' => 'product_store', 'uses' => 'Products\ProductsController@store'
		]);
		Route::patch('produtos/atualizar/{product_id}', [
			'as' => 'product_update', 'uses' => 'Products\ProductsController@update'
		]);
	});
});

