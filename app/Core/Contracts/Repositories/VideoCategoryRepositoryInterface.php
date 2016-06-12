<?php

namespace OneStop\Core\Contracts\Repositories;

interface VideoCategoryRepositoryInterface
{

	/**
	 * Get all the video categories.
	 *
	 * @return  \OneStop\Core\Support\Collections\VideoCategoryCollection
	 */
	public function getAll();

}
