<?php

namespace OneStop\Core\Contracts\Repositories;


interface VideoRepositoryInterface
{

	/**
	 * Get all the videos
	 *
	 * @return  \OneStop\Core\Support\Collections\VideoCollection
	 */
	public function getAll();
}
