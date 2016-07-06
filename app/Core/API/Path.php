<?php

namespace OneStop\Core\API;

use League\Flysystem\Util;


/**
 * methods for file paths.
 */
class Path
{

	public static function assemblePath($parent,$path,$needle)
	{


		if(strpos($path,$needle) === false || strpos($path,$needle) !== 0){
			$path = '/' . $path;
		}

		return $parent . $path;
	}


	/**
	 * [resolve description]
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
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

	public static function popLastSegment($path)
	{
		$path = explode('/',$path);
		array_pop($path);

		return implode('/',$path);
	}

}
