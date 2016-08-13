<?php

namespace OneStop\Http\Controllers\Cp;

use Illuminate\Http\Request;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoCategoryRepositoryInterface as VideoCategoryRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Core\Support\Traits\FormAjax;
use OneStop\Http\Controllers\CpController;
use OneStop\Http\Requests\StoreNewVideo;
use OneStop\Http\Requests\UpdateVideoRequest;

class VideoController extends CpController
{

	use FormAjax;

	/**
	 * Instance of Video Repository
	 *
	 * @var OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
	 */
	protected $videos;

	/**
	 * Instance of Video Category Repository
	 *
	 * @var OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository
	 */
	protected $categories;

	/**
	 * Instance of User Repository
	 *
	 * @var OneStop\Core\Repositories\Users\Eloquent\UserRepository
	 */
	protected $users;

	/**
	 * Create new instance of video controller.
	 *
	 * @param VideoRepository         $videos     [description]
	 * @param VideoCategoryRepository $categories [description]
	 */
	public function __construct(
		VideoRepositoryContract $videos,
		VideoCategoryRepositoryContract $categories,
		UserRepositoryContract $users,
		Request $request)
	{
		$this->videos = $videos;
		$this->categories = $categories;
		$this->users = $users;

		parent::__construct($request);
	}

	/**
	 * Display the video listing page.
	 *
	 * @return view
	 */
	public function index()
	{
		return view('cp.videos.index');
	}


	/**
	 * Show the create form
	 *
	 * @return string
	 */
	public function create(Request $request)
	{
		if($result = $this->isCreating($request,function($creating){
			$video = $this->videos->getById(1);
			return [
				'headerTitle' => 'Create a Video',
				'video'		  => null,
				'categories'  => $this->categories->getAll(),
				'users'		  => $this->users->getAll(),
			];
		})) return $result;

		return view('cp.videos.form');
	}

	/**
	 * Save the new video to the database.
	 *
	 * @param  StoreNewVideo $request [description]
	 * @return
	 */
	public function store(StoreNewVideo $request)
	{
		$this->videos->create($request);

		session()->flash('success','Video has been successfully created.');

		return response()->json([
			'path'	=> route('cp.videos.index')
		]);

	}

	/**
	 * Show the edit form of video.
	 *
	 * @param  string|int  $video   [description]
	 * @param  Request $request [description]
	 * @return view|data
	 */
	public function edit($video,Request $request)
	{

		if($result = $this->isEditing($request,function($editing) use ($video){
			$video = $this->videos->getById($video);
			return [
				'headerTitle' => 'Edit: ' . $video->title,
				'video'		  => $video,
				'categories'  => $this->categories->getAll(),
				'users'		  => $this->users->getAll(),
			];
		})) return $result;

		return view('cp.videos.form');
	}

	/**
	 * Update the given video.
	 *
	 * @param  string|integer $video
	 * @param  UpdateVideoRequest $request
	 * @return
	 */
	public function update($video,UpdateVideoRequest $request)
	{
		$this->videos->update($video,$request);

		session()->flash('success','Video has been successfully updated.');

		return response()->json([
			'path'	=> route('cp.videos.index')
		]);
	}

	/**
	 * Delete the video by its Id
	 *
	 * @return json
	 */
	public function delete()
	{

		$ids = $this->request->get('ids');

		if(count($ids)){
			$this->videos->delete($ids);
			return response()->json([
				'success'	=> true,
				'message'	=> 'The video was successfully deleted.'
			]);
		}

		return response()->json([
				'success'	=> false,
				'message'	=> 'There was an error deleting the video.'
		],400);
	}

	/**
	 *
	 *
	 * @return $data|json
	 */
	public function get()
	{
		$videos = $this->videos->getAll()->supplement('checked',function(){
			return false;
		});

		$data = [
			'columns'	=>	['title','category','featured'],
			'items'		=> $videos,
		];

		return $data;
	}
}
