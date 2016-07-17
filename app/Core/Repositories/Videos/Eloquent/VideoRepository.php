<?php

namespace OneStop\Core\Repositories\Videos\Eloquent;

use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Core\Models\Video;
use OneStop\Core\Support\Collections\VideoCollection;
use OneStop\Http\Requests\Request;

class VideoRepository implements VideoRepositoryContract
{

	/**
	 * Model Instance
	 *
	 * @var OneStop\Core\Models\Video;
	 */
	protected $model;

	/**
	 * Create new instance of VideoRepository
	 *
	 * @param Video $model
	 */
	public function __construct(Video $model)
	{
		$this->model = $model;
	}


	/**
	 * Create a new video and store it in the database.
	 *
	 * @param  Request $request
	 * @return
	 */
	public function create(Request $request)
	{
		// Check the StoreNewRequest
		$video = $this->model->create($request->all());
		return $video;
	}

	/**
	 * Update the video in the database.
	 *
	 * @param  string|integer  $video
	 * @param  Request $request
	 * @return bool|int
	 */
	public function update($video,Request $request)
	{
		$video = $this->getById($video);
		return $video->update($request->all());
	}

	/**
	 * Get a video by its id.
	 *
	 * @param  int $id [description]
	 * @return
	 */
	public function getById($id)
	{
		return $this->model->find($id);
	}

	/**
	 * Get all the videos
	 *
	 * @return OneStop\Core\Support\Collections\VideoCollection;
	 */
	public function getAll()
	{
		return new VideoCollection($this->model->All()->toArray());
	}

	public function getWhereNotIn($ids = array())
	{
		return new VideoCollection($this->model->whereNotIn('id',$ids)->get()->toArray());
	}

	/**
	 *
	 * @param  array  $ids [description]
	 * @return bool
	 */
	public function delete(array $ids)
	{
		return $this->model->destroy($ids);
	}

	/**
	 * Get the recent videos base on the $limit value.
	 *
	 * @param  integer $limit
	 * @return OneStop\Core\Support\Collections\VideoCollection;
	 */
	public function getRecentEntries($limit = 10)
	{
		return new VideoCollection($this->model->latest()->limit($limit)->get());
	}
}
