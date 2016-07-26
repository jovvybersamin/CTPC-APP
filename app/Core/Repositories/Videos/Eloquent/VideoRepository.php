<?php

namespace OneStop\Core\Repositories\Videos\Eloquent;

use Carbon\Carbon;
use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Core\Models\Video;
use OneStop\Core\Support\Collections\VideoCollection;
use OneStop\Core\Videos\Video as VideoObject;
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
		$data = $request->all();

		// add slug.
		if(! isset($data['slug'])) {
			$data['slug'] = str_slug($data['title']);
		}

		// If status is equal to one then set the published_date to current date.
		if((int)$data['status'] === 1) {
			$data['published_at'] = Carbon::now();
		} else {
			$data['published_at'] = null;
		}

		// Check the StoreNewRequest
		$video = $this->model->create($data);
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
		$data = $request->all();

		// add slug.
		if(! isset($data['slug'])) {
			$data['slug'] = str_slug($data['title']);
		}

		// If status is equal to one then set the published_date to current date.
		if((int)$data['status'] == 1) {
			$data['published_at'] = Carbon::now();
		} else {
			$data['published_at'] = null;
		}



		$video = $this->getById($video);

		return $video->update($data);
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
	 * Get a video by its slug.
	 *
	 * @param  string $slug
	 * @return
	 */
	public function getBySlug($slug)
	{
		return $this->model->where('slug',$slug)->first();
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

	/**
	 * [getWhereNotIn description]
	 * @param  array  $ids [description]
	 * @return [type]      [description]
	 */
	public function getWhereNotIn($ids = array())
	{
		return new VideoCollection($this->model->whereNotIn('id',$ids)->get()->toArray());
	}

	/**
	 *
	 * @param  VideoObject $video [description]
	 * @return [type]             [description]
	 */
	public function getRelatedByCategory(VideoObject $video,$skip = 0, $take = 10,$ids = array())
	{
		array_push($ids,$video->id());

		return new VideoCollection(
				$this->model
					 ->whereNotIn('id',$ids)
					 ->category($video->category())
					 ->published()
					 ->skip($skip)
					 ->take($take)
					 ->orderByRaw('RAND()')
					 ->get()
					 ->toArray()
		);
	}

	public function getRelatedByTags(VideoObject $video)
	{

	}

	/**
	 * Get the videos by search keyword.
	 *
	 * @param  string $keyword
	 * @param  int $paginate
	 * @return
	 */
	public function getVideosBySearchKeyword($keyword,$paginate)
	{
		return $this->model->published()->searchByKeyword($keyword)->paginate($paginate);
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
