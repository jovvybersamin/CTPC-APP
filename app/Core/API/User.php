<?php

namespace OneStop\Core\API;

class User
{

	/**
	 *
	 * @return [type] [description]
	 */
	public static function get()
	{
		return auth()->user();
	}

	/**
	 * Description
	 * @param type $role
	 * @return type
	 */
	public static function hasRole($role)
	{

		if($user = self::get()){

			return $user->hasRole($role);
		}
		return false;
	}


}
