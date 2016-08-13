<?php

namespace OneStop\Core\Repositories\Business\Categories\Eloquent;

use Illuminate\Http\Request;
use OneStop\Core\Contracts\Repositories\BusinessCategoryRepositoryInterface as  BusinessCategoryContract;
use OneStop\Core\Models\BusinessCategory;
use OneStop\Core\Support\Collections\BusinessCategoryCollection;

/**
 * TODO:create an interface for this repository.
 * Date:August 6, 2016
 */
class CategoryRepository implements BusinessCategoryContract
{

	protected $model;

	public function __construct(BusinessCategory $model)
	{
		$this->model = $model;
	}

	/**
	 * Create a new business category and store it in the database.
	 *
	 *
	 * @param  Request $request
	 * @return OneStop\Core\Models\BusinessCategory.
	 */
	public function create(Request $request)
	{
		$category = $this->model->create([
			'name'	=> $request->get('name'),
			'slug'	=> str_slug(($request->get('name'))),
		]);

		return $category;
	}


	/**
	 * Get the business category by its slug.
	 *
	 * @param  string $slug
	 * @return
	 */
	public function getBySlug($slug = '')
	{
		return $this->model->where('slug',$slug)->first();
	}

	/**
	 * Get all the Business Categories.
	 *
	 * @return OneStop\Core\Support\Collections\BusinessCategoryCollection.
	 */
	public function getAll()
	{
		return new BusinessCategoryCollection($this->model->all()->toArray());
	}


	/**
	 * Get all the categories where id is not in the ids parameter.
	 *
	 * @param  array  $ids [description]
	 * @return
	 */
	public function getWhereNotIn($column = 'id',array $ids)
	{
		return $this->model->whereNotIn($column,$ids);
	}


	/**
	 * Get the business category by its id and update it.
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
		return $category->save();
	}

	/**
	 * Delete a categories by ids.
	 *
	 * @param  array $ids
	 * @return int
	 */
	public function delete($ids)
	{
		return $this->model->destroy($ids);
	}


}
