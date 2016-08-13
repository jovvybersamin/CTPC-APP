<?php

use Intervention\Image\Facades\Image;

Route::get('avatars/{filename}',function($filename)
{
	return Image::make(storage_path() . '/hphotos/xpf1/' . $filename)
				->resize(300,300)
				->response();
})->name('avatar');

Route::get('logo/{logo}',function($logo)
{
		return Image::make(storage_path() . '/hphotos/xpf1/' . $logo)
				->resize(300,300)
				->response();
});
