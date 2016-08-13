<?php

namespace OneStop\Http\Controllers\Site;

use Illuminate\Http\Request;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Http\Controllers\SiteController;

class UserController extends SiteController
{

	/**
	 * @var
	 */
	protected $users;

	/**
	 * @var [type]
	 */
	protected $videos;

	public function __construct(UserRepositoryContract $users,VideoRepositoryContract $videos)
	{
		$this->users = $users;
		$this->videos = $videos;
	}


	/**
	 * Show the profile of the given provider.
	 *
	 * @param  Request $request [description]
	 * @return view
	 */
	public function profile($username,Request $request)
	{
		$user = $this->users->getUserByUsernameWithVideos($username);
		return view('site.users.profile',compact(['user']));
	}

}
