<?php

use OneStop\Core\Support\Menu\Menu;

Route::get('test',function(){
	return base64_encode(1 + time());
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


require_once __DIR__ . '/Routes/cp/cp.php';

require_once __DIR__ . '/Routes/site/site.php';


