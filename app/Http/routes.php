<?php

use OneStop\Core\Support\Menu\Menu;

Route::get('123logout',function(){
	Auth::logout();
});

Route::get('phpinfo',function(){
	phpinfo();
});

Route::get('/',function(){
	return view('site.home');
});

Route::get('test',function(){
	$user = Auth::loginUsingId(1);

});

Route::get('menu',function()
{
	$menu = new Menu();
	$menu->addContainer('cp');
	$menu->container('cp')->addMenu('Users','cp.users.*');
	$menu->container('cp')->addMenu('Videos','cp.videos.*');
	$menu->container('cp')->find('Users')->addSubMenu('All Users','cp.users.index');
	$menu->container('cp')->find('All Users')->addSubMenu('All Users 2','cp.users.index');
	$menu->container('cp')->find('Videos')
						  ->addSubMenu('All Videos','cp.videos.index')
						  ->addSubMenu('New Video','cp.videos.create');


	dump($menu->getContainers());
});



Route::group(['middleware' => 'web'], function()
{
	require_once __DIR__ . '/Routes/utilities.php';

	require_once __DIR__ . '/Routes/api.php';

	require_once __DIR__ . '/Routes/cp/cp.php';

	require_once __DIR__ . '/Routes/site/site.php';
});



