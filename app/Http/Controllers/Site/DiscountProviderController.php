<?php

namespace OneStop\Http\Controllers\Site;

use Illuminate\Http\Request;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Http\Controllers\SiteController;

class DiscountProviderController extends SiteController
{

	/**
	 * @var
	 */
	protected $providers;

	/**
	 * @var [type]
	 */
	protected $videos;

	public function __construct(UserRepositoryContract $users,VideoRepositoryContract $videos)
	{
		$this->providers = $users;
		$this->videos = $videos;
	}

	/**
	 * Show the list of discount providers.
	 *
	 * @return View
	 */
	public function index()
	{
		$providers = $this->providers->getAllDiscountProviders();
		return view('site.providers.index',['providers' => $providers]);
	}

	/**
	 * Show the profile of the given provider.
	 *
	 * @param  Request $request [description]
	 * @return view
	 */
	public function profile($username,Request $request)
	{
		$provider = $this->providers->getUserByUsername($username);
		$videos = $this->videos->getVideosByUploaderId($provider->id);
		return view('site.users.profile',compact(['provider','videos']));
	}

}
