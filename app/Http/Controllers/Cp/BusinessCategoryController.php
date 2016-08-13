<?php

namespace OneStop\Http\Controllers\Cp;

use Illuminate\Http\Request;
use OneStop\Core\Contracts\Repositories\BusinessCategoryRepositoryInterface as BusinessCategoryRepositoryContract;
use OneStop\Core\Support\Traits\FormAjax;
use OneStop\Http\Controllers\CpController;
use OneStop\Http\Requests\StoreNewBusinessCategory;
use OneStop\Http\Requests\UpdateBusinessCategory;

class BusinessCategoryController extends CpController
{

	use FormAjax;

	protected $categories;

	public function __construct(BusinessCategoryRepositoryContract $categories,Request $request)
	{
		$this->categories = $categories;
		parent::__construct($request);
	}

	/**
	 * Show the listing page.
	 *
	 * @return view
	 */
	public function index()
	{
		return view('cp.business.categories.index');
	}

	public function create(Request $request)
	{
		if($result = $this->isCreating($request,function($creating){
			return [
				'headerTitle' => 'Create Business Category',
				'category'	  => null,
			];
		})) return $result;

		return view('cp.business.categories.form');
	}


	public function store(StoreNewBusinessCategory $request)
	{
		$this->categories->create($request);

		session()->flash('success','Business Category has been successfully created.');

		return response()->json([
			'path'	=> route('cp.business.categories.index')
		]);
	}

	/**
	 * [edit description]
	 * @param  Request $rueqest [description]
	 * @param  [type]  $slug    [description]
	 * @return [type]           [description]
	 */
	public function edit(Request $request,$slug)
	{
		if($result = $this->isEditing($request,function($editing) use ($slug){

			$category = $this->categories->getBySlug($slug);

			return [
				'headerTitle' => 'Edit ' . $category->name,
				'category'	  => $category,
			];
		})) return $result;

		return view('cp.business.categories.form');
	}

	/**
	 *
	 * @param  UpdateBusinessCategory $request  [description]
	 * @param  [type]                 $category [description]
	 * @return [type]                           [description]
	 */
	public function update(UpdateBusinessCategory $request,$category)
	{
		$this->categories->update($category,$request);

		session()->flash('success','Business Category has been successfully updated.');

		return response()->json([
			'path'	=> route('cp.business.categories.index')
		]);
	}

	/**
	 * Delete a categories by a given ids.
	 *
	 *
	 * @return [type] [description]
	 */
	public function delete()
	{
		$ids = $this->request->get('ids');

		if(count($ids)){
		$this->categories->delete($ids);
			return response()->json([
				'success'	=> true,
				'message'	=> 'The category was successfully deleted.'
			]);
		}

		return response()->json([
				'success'	=> false,
				'message'	=> 'There was an error deleting the category.'
		],400);
	}


	/**
	 *
	 * @return JSON
	 */
	public function get()
	{
		$categories = $this->categories->getAll()->supplement('checked',function(){
			return false;
		});

		$data = [
			'columns' 	=> ['name','slug'],
			'items'		=> $categories
		];

		return $data;
	}


}
