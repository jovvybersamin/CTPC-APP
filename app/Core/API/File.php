<?php

namespace OneStop\Core\API;

use OneStop\Core\Filesystem\FileAccessor;


/**
 * Manipulating Files
 */
class File
{
	public  static function disk($container)
	{
		$disk = $container->getDriver();
		$container = $container->getContainer();
		return new FileAccessor($disk,$container,app('filesystem')->disk($disk));
	}

	public static function __caaStatic($method,$args)
	{
		return call_user_func_array([self::disk(),$method], $args);
	}

}
