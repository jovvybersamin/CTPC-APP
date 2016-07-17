<?php

namespace OneStop\Http\Controllers\Site;

use OneStop\Http\Controllers\SiteController;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;

class VideosController extends SiteController
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
	 * Show the video
	 *
	 * @return view
	 */
	public function show($id)
	{
		// TODO:: make a slug instead of an id
		$video = $this->videos->getById($id);
		$videos = $this->videos->getWhereNotIn([$id]);
		return view('site.videos.show',compact('video','videos'));
	}



}
