<?php

namespace OneStop\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
use OneStop\Core\Support\Collections\VideoCollection;
use OneStop\Core\Videos\Video;
use OneStop\Core\Videos\VideoService;
use OneStop\Http\Controllers\SiteController;


class VideosController extends SiteController
{

	/**
	 * @var OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
	 */
	protected $videos;


	protected $categories;

	public function __construct(VideoRepository $videos, VideoCategoryRepository $categories,Request $request)
	{
		$this->videos = $videos;
		$this->categories = $categories;

		parent::__construct($request);
	}


	/**
	 * Show the video
	 *
	 * @return view
	 */
	public function watch($slug)
	{
		$video = $this->videos->getBySlug($slug);

		VideoService::incrementHitsBySlug($slug);

		return view('site.videos.watch',compact('video'));
	}

	/**
	 *
	 * @param  string $category
	 * @return
	 */
	public function getVideosByCategory($slug)
	{
		$category = $this->categories->getBySlug($slug);
		$videos = $category->videosWithPaginate();
		return view('site.videos.category',compact('category','videos'));
	}

	/**
	 * Get the count of related video.
	 *
	 * @return int
	 */
	public function getRelatedCount()
	{
		$video = new Video($this->request->get('video'));
		$count = VideoService::getRelatedCount($video);
		return $count;
	}

	/**
	 * Get the related videos.
	 *
	 * @return collection
	 */
	public function getRelated()
	{
		$video = new Video($this->request->get('video'));

		$videos = new VideoCollection($this->request->get('videos'));

		$skip = $this->request->get('skip');

		$take = $this->request->get('take');

		DB::connection()->enableQueryLog();

		$videos = $this->videos->getRelatedByCategory($video,$skip,$take,$videos->getIds());

		// if($skip >= 10){
		// 	$queries = DB::getQueryLog();
		// 	dd($queries);
		// }

		// I want to get 10 related videos ( with the same category.)
		// If no related videos then get latest published video 10.
		// If the returned related videos is not equal to 10 then add a latest published videos.

		return [
			'videos' => $videos->shuffle()->all()
		];
	}


}
