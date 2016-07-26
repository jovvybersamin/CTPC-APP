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
	Route::get('watch/{video}','VideosController@watch')->name('video.watch');
	Route::get('categories/{category}','VideosController@getVideosByCategory')->name('video.category');


	Route::post('video/related','VideosController@getRelated');
	Route::post('video/related/count','VideosController@getRelatedCount');

	// Search
	Route::get('search','SearchController@search')->name('search');
});
