<?php

Route::group(['prefix' => 'users'],function()
{

	Route::get('/','UserController@index')->name('users.index');
	Route::get('create','UserController@create')->name('users.create');
	Route::get('{users}/edit','UserController@edit')->name('users.edit');

	Route::post('/','UserController@store')->name('users.store');
	Route::patch('{users}','UserController@update')->name('users.update');
	Route::delete('{users}','UserController@delete')->name('users.delete');

});

