<?php

namespace OneStop\Http\Controllers\Cp;

use Illuminate\Http\Request;
use OneStop\Http\Controllers\Controller;
use OneStop\Http\Requests;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;


class UserController extends Controller
{

	protected $userRepo;

	public function __construct(UserRepositoryContract $users)
	{
		$this->userRepo = $users;
	}

	/**
	 * Show the user listings page.
	 *
	 * @return Response.
	 */
	public function index()
	{

		$users = $this->userRepo->getAll()->supplement('checked',function( ){
			return false;
		});

		return view('cp.users.index');
	}

	/**
	 * Show the user creation page.
	 *
	 * @return Response.
	 */
	public function create()
	{
		return view('cp.users.create');
	}


	/**
	 *
	 *
	 * @return [type] [description]
	 */
	public function get()
	{

		$users = $this->userRepo->getAll()->supplement('checked',function(){
			return false;
		});

		$data = [
			'columns' => ['name','username'],
			'items' => $users
		];

		return $data;
	}
}
