<?php

namespace OneStop\Http\Controllers\Cp;


use Illuminate\Http\Request;
use OneStop\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

	use AuthenticatesUsers,ThrottlesLogins;

	/**
	 * Where to redirect the user after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/cp/users';

	/**
	 * Where to redirect the user after logout.
	 *
	 * @var string
	 */
	protected $redirectAfterLogout = '/cp/auth/login';

	/**
	 * The control panel login view.
	 *
	 * @var string
	 */
	protected $loginView = 'cp.auth.login';



	/**
	 * [$username description]
	 * @var [type]
	 */
	protected $username = 'username';

	 /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
}
