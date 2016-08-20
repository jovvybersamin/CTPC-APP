<?php

namespace OneStop\Core\Repositories\Users\Eloquent;

use Illuminate\Http\Request;
use OneStop\Core\Models\User;
use OneStop\Core\Services\User as UserService;
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
	public function createUserFromBackend(Request $request)
	{
		if($user = $this->createNewUser($request)){
			// Send an event UserCreated
			return $user;
		}
	}

	/**
	 *
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	protected function createNewUser(Request $request)
	{

		$user =  $this->model->create([
			'name' 		=> 	$request->name,
			'username' 	=> 	$request->username,
			'email'	   	=> 	$request->email,
			'about'	  	=> 	$request->about,
			'status'	=> 1,
			'password'	=> bcrypt($request->password)
		]);

		if(!empty($request->roles)){
			$user->roles()->attach($request->roles);
		}

		$ids = [];

		$categories = $request->get('categories');

		if(!empty($categories)){
			$collect = collect($categories);
			$collect->each(function($item,$key) use (&$ids){
				array_push($ids,$item['id']);
			});
		}

		$user->categories()->attach($ids);

		$userService = new UserService();
		$userService->setUser($user);
		$userService->addDefaultAvatar();
		return $user;
	}

	/**
	 * Get all the users.
	 *
	 * @return OneStop\Core\Support\Collections\UserCollection
	 */
	public function getAll()
	{
		return new UserCollection($this->model->all()->toArray());
	}

	/**
	 * Get the recent users base on $limit value.
	 *
	 * @param  integer $limit
	 * @return OneStop\Core\Support\Collections\UserCollection
	 */
	public function getRecentEntries($limit = 10)
	{
		return $this->model->latest()->limit($limit)->get();
	}

	/**
	 * Get a user by its username.
	 *
	 * @param  String $username
	 * @return User
	 */
	public function getUserByUsername($username,$withRoles = false)
	{
		if($withRoles){
			return User::with('roles')
					    ->with('categories')
						->where('username',$username)
						->first();
		}
		return User::where('username',$username)->first();
	}

	public function getUserByUsernameWithVideos($username)
	{
		return User::with('videos')
					->where('username',$username)->firstOrFail();
	}

	/**
	 * Update the given user by its username.
	 *
	 * @param  String $username
	 * @param  Request $request
	 * @return Boolean
	 */
	public function updateByUsername($username,Request $request)
	{
		$data = array_except($request->all(),['roles','edit_url']);
		$user = User::where('username',$username)->first();
		$user->roles()->sync($request->get('roles'));

		$categories = $request->get('categories');

		$ids = [];

		if(!empty($categories)){
			$collect = collect($categories);
			$collect->each(function($item,$key) use (&$ids){
				array_push($ids,$item['id']);
			});
		}

		if(isset($data['password'])){
			$data['password'] = bcrypt($data['password']);
		}

		$user->categories()->sync($ids);

		return $user->update($data);
	}

	/**
	 *
	 * @return [type] [description]
	 */
	public function getAllDiscountProviders()
	{
		return $this->model->whereHas('roles',function( $query )
		{
			$query->where('role_id',2)->where('role_id','<>',1);
		})->get();
	}


}
