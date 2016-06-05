<?php

namespace OneStop\Core\Contracts\Repositories;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{


	/**
	 * Create a new user from backend server.
	 *
	 * @return null|
	 */
	public function createUserFromBackend(Request $request);

	/**
	 * Get all the users
	 *
	 * @return \OneStop\Core\Support\Collections\UserCollection
	 */
	public function getAll();




}
