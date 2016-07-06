<?php

namespace OneStop\Core\API;

use OneStop\Core\Filesystem\FolderAccessor;

class Folder
{
	public static function disk($container)
	{
		$disk = $container->getDriver();
		$container = $container->getContainer();
		return new FolderAccessor($disk,$container,app('filesystem')->disk($disk));
	}
}
