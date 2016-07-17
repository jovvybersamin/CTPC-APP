<?php

namespace OneStop\Http\Controllers\Cp;

use OneStop\Core\Repositories\Users\Eloquent\UserRepository;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
use OneStop\Http\Controllers\CpController;


class DashboardController extends CpController
{

	/**
	 * @var OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
	 */
	protected $videos;

	/**
	 * @var OneStop\Core\Repositories\Users\Eloquent\UserRepository;
	 */
	protected $users;

	public function __construct(VideoRepository $videos,UserRepository $users)
	{
		$this->videos = $videos;
		$this->users = $users;
	}


	/**
	 * Show the dashboard page.
	 *
	 * @return view
	 */
	public function index()
	{
		$videos = $this->videos->getRecentEntries(10)->toArray();
		$users = $this->users->getRecentEntries(10)->toArray();

		return view('cp.dashboard.index',compact('videos','users'));
	}

}
