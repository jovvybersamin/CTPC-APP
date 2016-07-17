<?php

namespace OneStop\Http\Controllers\Site;

use OneStop\Http\Controllers\SiteController;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;

class PagesController extends SiteController
{

	/**
	 * @var OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
	 */
	protected $videos;

	public function __construct(VideoRepository $videos)
	{
		$this->videos = $videos;
	}
	/**
	 * Show the Home Page.
	 *
	 * @return view
	 */
	public function index()
	{
		// inject videos
		$videos = $this->videos->getAll();
		return view('site.pages.home',compact('videos'));
	}


	/**
	 * Show the About Page.
	 *
	 * @return View
	 */
	public function about()
	{
		return view('site.pages.about');
	}

	/**
	 * Show the Services Page.
	 *
	 * @return View
	 */
	public function services()
	{
		return view('site.pages.services');
	}


	/**
	 * Show the contact page.
	 *
	 * @return View
	 */
	public function contact()
	{
		return view('site.pages.contact');
	}
}
