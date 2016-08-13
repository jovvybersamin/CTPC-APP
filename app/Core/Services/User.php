<?php

namespace OneStop\Core\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use OneStop\Core\API\Helper;
use OneStop\Core\Models\User as UserModel;

class User
{

	protected $instance;

	public function addDefaultAvatar()
	{
		if($this->instance != null){
			$this->instance->profile = 'default.png';
			$this->instance->save();
		}
		return false;
	}
	/**
	 *
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getById($id)
	{
		$this->instance = UserModel::find($id);
		return $this;
	}

	/**
	 * Change the avatar of the instance user.
	 *
	 * @param  File $file [description]
	 * @return bool
	 */
	public function changeAvatar($file)
	{
		$photoname = Helper::makeUuid() . '.png';
		Image::make($file)->resize(300,300)->save(storage_path() . '/hphotos/xpf1/' . $photoname);
		//$file->move(storage_path() . '/hphotos/xpf1/',$photoname);
		$this->instance->profile = $photoname;
		$this->instance->save();
	}

	/**
	 * Get the avatar of the instance user.
	 *
	 * @return string
	 */
	public function getAvatar()
	{
		return $this->instance->profile;
	}

	/**
	 *
	 * @param Model $user [description]
	 */
	public function setUser($user)
	{
		$this->instance = $user;
	}
	/**
	 *
	 * @param  [type] $method [description]
	 * @param  [type] $args   [description]
	 * @return [type]         [description]
	 */
	public function __callStatic($method,$args)
	{
		$instance = new User();
		return call_user_func_array([$instance,$method],$args);
	}

}
