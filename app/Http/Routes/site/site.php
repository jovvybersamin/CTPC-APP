<?php

Route::group(['namespace' => 'Site'],function()
{
	// Pages.
	Route::get('/','PagesController@index')->name('home');
	Route::get('about','PagesController@about')->name('about');
	Route::get('services','PagesController@services')->name('services');
	Route::get('contact','PagesController@contact')->name('contact');

	// Videos
	Route::get('v','VideosController@index')->name('vidoes');
	Route::get('v/{video}','VideosController@show')->name('video.show');

});
