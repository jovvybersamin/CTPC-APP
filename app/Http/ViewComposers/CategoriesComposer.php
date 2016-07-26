<?php

namespace OneStop\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;

class CategoriesComposer
{

	protected $categories;

	public function __construct(VideoCategoryRepository $categories)
	{
		$this->categories  = $categories;
	}

	/**
	 * Bind the data to view.
	 * @ref https://laravel.com/docs/5.1/views#sharing-data-with-all-views
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose($view)
	{
		$view->with('categories',$this->categories->getAll());
	}
}
