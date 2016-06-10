<?php

Route::group(['namespace' => 'Cp','prefix' => 'cp','as' => 'cp.'],function()
{

	Route::get('account','UserController@account')->name('account');

	// Login
	Route::group(['prefix' => 'auth'], function()
	{

		Route::get('/','AuthController@getLogin');
		Route::get('login','AuthController@getLogin')->name('auth.login');
		Route::post('login','AuthController@postLogin');
		Route::get('logout','AuthController@logout')->name('auth.logout');

	});

	// Users
	Route::group(['prefix' => 'users'],function()
	{

		Route::get('/','UserController@index')->name('users.index');
		Route::get('get','UserController@get')->name('users.get');
		Route::get('create','UserController@create')->name('users.create');
		Route::get('{users}/edit','UserController@edit')->name('users.edit');


		Route::put('{users}','UserController@update')->name('users.update');
		Route::post('/','UserController@store')->name('users.store');
		Route::delete('{users}','UserController@delete')->name('users.delete');
	});

});


