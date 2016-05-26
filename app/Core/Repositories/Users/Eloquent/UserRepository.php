<?php

namespace OneStop\Core\Repositories\Users\Eloquent;

use Illuminate\Http\Request;
use OneStop\Core\Models\User;
use OneStop\Core\Support\Collections\UserCollection;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{

	protected $model;

	/**
	 * @param User $model
	 */
	public function __construct(User $model)
	{
		$this->model = $model;
	}

	/**
	 * Create a new user.
	 *
	 * @return null|
	 */
	public function create(Request $request)
	{

	}

	/**
	 * Get all the users.
	 *
	 * @return OneStop\Core\Support\Collections\UserCollection
	 */
	public function getAll()
	{
		return new UserCollection($this->model->all());
	}


}
