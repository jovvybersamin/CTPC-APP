<?php

namespace OneStop\Http\Controllers\Site;

use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
use OneStop\Http\Controllers\SiteController;

class PagesController extends SiteController
{

	/**
	 * @var OneStop\Core\Repositories\Videos\Eloquent\VideoRepository
	 */
	protected $videos;

	/**
	 * @var OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository
	 */
	protected $categories;

	public function __construct(VideoRepository $videos,VideoCategoryRepository $categories)
	{
		$this->videos = $videos;
		$this->categories = $categories;
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
		$categories = $this->categories->getAllWithVideos();
		return view('site.pages.home',compact('videos','categories'));
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
