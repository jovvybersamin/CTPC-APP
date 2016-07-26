<?php

namespace OneStop\Http\Controllers\Site;

use Illuminate\Http\Request;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
use OneStop\Http\Controllers\SiteController;
use OneStop\Http\Requests;

class SearchController extends SiteController
{
	protected $videos;

	public function __construct(VideoRepository $videos,Request $request)
	{
		$this->videos = $videos;

		parent::__construct($request);
	}

	public function search()
	{
		$keyword = $this->request->get('q');
		$videos = $this->videos->getVideosBySearchKeyword($keyword,30);
		return view('site.videos.search',compact('videos','keyword'));
	}

}
