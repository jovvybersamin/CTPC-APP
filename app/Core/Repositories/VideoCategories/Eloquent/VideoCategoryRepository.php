<?php

namespace OneStop\Core\Repositories\VideoCategories\Eloquent;

use Illuminate\Support\Facades\DB;
use OneStop\Core\Contracts\Repositories\VideoCategoryRepositoryInterface as CategoryRepositoryContract;
use OneStop\Core\Models\VideoCategory;
use OneStop\Core\Support\Collections\VideoCategoryCollection;
use OneStop\Core\Support\Collections\VideoCollection;
use OneStop\Http\Requests\Request;

class VideoCategoryRepository implements CategoryRepositoryContract
{

	/**
	 * Model instance.
	 *
	 * @var OneStop\Core\Models\VideoCategory;
	 */
	protected $model;

	/**
	 *
	 * @param VideoCategory $model
	 */
	public function __construct(VideoCategory $model)
	{
		$this->model = $model;
	}

	/**
	 * Create a new video category and store it in the database.
	 *
	 *
	 * @param  Request $request
	 * @return OneStop\Core\Models\VideoCategory.
	 */
	public function create(Request $request)
	{
		$category = $this->model->create([
			'name'	=> $request->get('name'),
			'slug'	=> str_slug(($request->get('name'))),
			'description' => $request->get('description')
		]);

		return $category;
	}


	/**
	 * Get the video category by its slug.
	 *
	 * @param  string $slug
	 * @return
	 */
	public function getBySlug($slug = '')
	{
		return $this->model->where('slug',$slug)->first();
	}

	/**
	 * Get all the Video Categories.
	 *
	 * @return OneStop\Core\Support\Collections\VideoCategoryCollection.
	 */
	public function getAll()
	{
		return new VideoCategoryCollection($this->model->all()->toArray());
	}


	/**
	 * [getAllNotCollection description]
	 * @return [type] [description]
	 */
	public function getAllWithVideos()
	{
		return new VideoCategoryCollection(
			  $this->model->has('videos')->get()
		);
	}



	/**
	 * Get the video category by its id and update it.
	 *
	 * @param  int $category [description]
	 * @param  Request $request  [description]
	 * @return Boolean
	 */
	public function update($category,Request $request)
	{
		$category = $this->model->find($category);
		$category->name = $request->get('name');
		$category->slug = str_slug($request->get('name'));
		$category->description = $request->get('description');
		return $category->save();
	}
}
