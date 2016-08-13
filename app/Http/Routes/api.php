<?php

Route::group(['prefix' => 'api','as' => 'api.'],function()
{

	Route::group(['prefix' => 'user','as' => 'user'], function()
	{
		Route::post('changeAvatar','ApiController@changeAvatar');
	});

});
