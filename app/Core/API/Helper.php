<?php

namespace OneStop\Core\API;

/**
 *
 *  Helper methods.
 *
 */
class Helper
{

	/**
	 * Make a UUID.
	 *
	 * @return string
	 */
	public static function makeUuid()
	{
		return (string) \Uuid::generate(4);
	}
}
