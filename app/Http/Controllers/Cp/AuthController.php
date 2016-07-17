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
	 * @var string
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

     /**
     * Get the guest middleware for the application.
     */
    public function guestMiddleware()
    {
        $guard = $this->getGuard();

        return $guard ? 'guest.cp:'.$guard : 'guest.cp';
    }
}
