<?php

namespace OneStop\Core\Contracts\Repositories;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{


	/**
	 * Create a new user
	 *
	 * @return null|
	 */
	public function create(Request $request);

	/**
	 * Get all the users
	 *
	 * @return \OneStop\Core\Support\Collections\UserCollection
	 */
	public function getAll();




}
