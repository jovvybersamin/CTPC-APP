<?php

namespace OneStop\Core\Contracts\Repositories;

interface BusinessCategoryRepositoryInterface
{

	/**
	 * Get all the business categories.
	 *
	 * @return  \OneStop\Core\Support\Collections\BusinessCategoryCollection
	 */
	public function getAll();

}
