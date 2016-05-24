<?php

namespace App\Http\Controllers\Cp;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

	/**
	 * Show the user listings page.
	 *
	 * @return Response.
	 */
	public function index()
	{
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

}
