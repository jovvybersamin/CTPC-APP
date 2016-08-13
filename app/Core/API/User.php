<?php

namespace OneStop\Core\API;

use OneStop\Core\Services\User as UserService;

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

	/**
	 * [getById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getById($id)
	{
		$userService = new UserService();
		return $userService->getById($id);
	}


}
