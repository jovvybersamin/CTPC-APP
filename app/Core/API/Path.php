<?php

namespace OneStop\Core\API;

use League\Flysystem\Util;


/**
 * methods for file paths.
 */
class Path
{


	public static function resolve($path)
	{
		return Util::normalizeRelativePath($path);
	}


	/**
	 * Get the file extension.
	 *
	 * @param  string $path
	 * @return string
	 */
	public static function extension($path)
	{
		return array_get(pathinfo($path),'extension');
	}

	public static function filename($path)
	{
		return array_get(pathinfo($path),'filename');
	}


}
