<?php

namespace OneStop\Http\Controllers\Cp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;
use OneStop\Core\Models\Role;
use OneStop\Core\Models\User;
use OneStop\Core\Repositories\Business\Categories\Eloquent\CategoryRepository as BusinessCategoryRepository;
use OneStop\Core\Support\Traits\FormAjax;
use OneStop\Http\Controllers\Controller;
use OneStop\Http\Requests;
use OneStop\Http\Requests\StoreNewUser;
use OneStop\Http\Requests\UpdateUser;


class UserController extends Controller
{
	use FormAjax;

	/**
	 * @var OneStop\Core\Repositories\Users\Eloquent\UserRepository
	 */
	protected $users;

	/**
	 * @var OneStop\Core\Repositories\Business\Categories\Eloquent\CategoryRepository
	 */
	protected $categories;

	public function __construct(UserRepositoryContract $users,BusinessCategoryRepository $categories)
	{
		$this->users = $users;
		$this->categories = $categories;
	}

	/**
	 *
	 * @return [type] [description]
	 */
	public function account()
	{
		return redirect()->route('cp.users.edit',Auth::user()->username);
	}

	/**
	 * Show the user listings page.
	 *
	 * @return Response.
	 */
	public function index()
	{

		$users = $this->users->getAll()->supplement('checked',function( ){
			return false;
		});

		return view('cp.users.index');
	}

	/**
	 * Show the user creation page.
	 *
	 * @return Response.
	 */
	public function create(Request $request)
	{
		if($result = $this->isCreating($request,function($creating){
			$categories = $this->categories
							->getWhereNotIn('id',[])
							->get();

			return [
					  'headerTitle' => 'Create User',
					  'user' => null,
					  'roles' => Role::all(),
					  'categories' => $categories,
				   ];
		}))
		{
			return $result;
		};

		return view('cp.users.form');
	}

	/**
	 * Store new user to the database.
	 *
	 * @param  Request $request [description]
	 * @return JSON
	 */
	public function store(StoreNewUser $request)
	{

		$this->users->createUserFromBackend($request);

		session()->flash('success','User was successfully created.');

		return response()->json(['path' => route('cp.users.index')]);
	}

	/**
	 * Show the Edit User Form.
	 *
	 * @param  String $user [description]
	 * @return View
	 */
	public function edit(Request $request,$username)
	{

		if($result = $this->isEditing($request,function($creating) use ($username){
			$user = $this->users->getUserByUsername($username,true);

			$categories = $this->categories
					->getWhereNotIn('id',$user->getCategoriesIds()->toArray())
					->get();

			return [
					  'headerTitle' => 'Edit ' . $user->name,
					  'user' => $user->toArray(),
					  'roles' => Role::all(),
  					  'categories' => $categories->toArray(),
				   ];
		}))
		{
			return $result;
		};

		return view('cp.users.form');
	}


	/**
	 * Update the details of the given user.
	 *
	 * @param  Request $request [description]
	 * @return JSON
	 */
	public function update($username,UpdateUser $request)
	{
		$this->users->updateByUsername($username,$request);
		session()->flash('success','User was successfully updated.');
		return response()->json(['path' => route('cp.users.index')]);
	}

	/**
	 *
	 * @return [type] [description]
	 */
	public function get()
	{

		$users = $this->users->getAll()->supplement('checked',function(){
			return false;
		});

		$data = [
			'columns' => ['name','username','email'],
			'items' => $users
		];

		return $data;
	}

}
