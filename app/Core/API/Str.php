<?php

namespace OneStop\Core\API;

use Stringy\StaticStringy as Stringy;

class Str
{

	/**
	 * @param  string $string
	 * @param  string $char   [description]
	 * @return string
	 */
	public static function removeLeft($string,$char)
	{
		return (string) Stringy::removeLeft($string,$char);
	}

}
