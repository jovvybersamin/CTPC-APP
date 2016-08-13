<?php

Route::group(['namespace' => 'Cp','prefix' => 'cp','as' => 'cp.'],function()
{

	Route::get('login','AuthController@getLogin')->name('login');
	Route::post('login','AuthController@postLogin');
	// Login
	Route::group(['prefix' => 'auth'], function()
	{
		Route::get('/','AuthController@getLogin');
		Route::get('login','AuthController@getLogin')->name('auth.login');

		Route::post('login','AuthController@postLogin');
		Route::get('logout','AuthController@logout')->name('auth.logout');
	});

	Route::get('account','UserController@account')->name('account');

	Route::group(['middleware' => 'admin'], function()
	{
		// Dashboard
		Route::get('/','DashboardController@index')->name('dashboard.index');

		// Assets
		Route::group(['prefix' => 'assets'],function()
		{
			Route::get('/','AssetsController@index')->name('assets.index');
			Route::get('browse/{container}/{folder?}','AssetsController@browse')->where('folder','.*')->name('assets.browse');
			Route::post('browse','AssetsController@json');
			Route::post('/','AssetsController@store')->name('assets.store');
			Route::delete('delete','AssetsController@delete')->name('assets.delete');

			Route::group(['prefix' => 'folders'],function()
			{
				Route::get('{container}/{folder}','AssetFoldersController@edit')->where('folder','.*')->name('folders.edit');
				Route::post('/','AssetFoldersController@store')->name('folders.store');
				Route::put('/','AssetFoldersController@update')->name('folders.update');
				Route::delete('delete','AssetFoldersController@delete')->name('folders.delete');
			});
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

		// Videos
		Route::group(['prefix' => 'videos'], function()
		{

			Route::get('/','VideoController@index')->name('videos.index');
			Route::get('get','VideoController@get')->name('videos.get');
			Route::get('create','VideoController@create')->name('videos.create');
			Route::get('{videos}/edit','VideoController@edit')->name('videos.edit');

			Route::put('{videos}','VideoController@update')->name('videos.update');
			Route::post('/','VideoController@store')->name('videos.store');
			Route::delete('delete','VideoController@delete')->name('videos.delete');
			Route::delete('{videos}','VideoController@delete');

			// Video Categories
			// cp/videos/categories/{category}
			Route::group(['prefix' => 'categories'],function()
			{

				Route::get('/','VideoCategoryController@index')->name('videos.categories.index');
				Route::get('get','VideoCategoryController@get')->name('videos.categories.get');
				Route::get('create','VideoCategoryController@create')->name('videos.categories.create');
				Route::get('{categories}/edit','VideoCategoryController@edit')->name('videos.categories.edit');

				Route::put('{categories}','VideoCategoryController@update')->name('videos.categories.update');
				Route::post('/','VideoCategoryController@store')->name('videos.categories.store');
				Route::delete('{categories}','VideoCategoryController@delete')->name('videos.categories.delete');
			});

		});

		// Business
		Route::group(['prefix' => 'business','as' => 'business.'],function()
		{
			Route::group(['prefix' => 'categories','as' => 'categories.'],function()
			{
				Route::get('/','BusinessCategoryController@index')->name('index');
				Route::get('get','BusinessCategoryController@get')->name('get');
				Route::get('create','BusinessCategoryController@create')->name('create');
				Route::get('{categories}/edit','BusinessCategoryController@edit')->name('edit');

				Route::put('{categories}','BusinessCategoryController@update')->name('update');
				Route::post('/','BusinessCategoryController@store')->name('store');
				Route::delete('{categories}','BusinessCategoryController@delete')->name('delete');
			});
		});
	});

});

