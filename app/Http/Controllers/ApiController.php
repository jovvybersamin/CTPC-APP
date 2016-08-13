<?php

namespace OneStop\Http\Controllers;

use Illuminate\Http\Request;
use OneStop\Core\API\User;
use OneStop\Http\Controllers\Controller;

class ApiController extends Controller
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Change the avatar of the requestor user.
	 *
	 * @return
	 */
	public function changeAvatar()
	{

		$avatar = $this->request->file('profile');
		$userId = $this->request->get('user');

		$this->validate($this->request,[
			'user' => 'required',
			'profile' => 'image'
		]);
		// Upload the photo now for the user.
		$user = User::getById($userId);

		$user->changeAvatar($avatar);

		return ['avatar' => $user->getAvatar()];

	}

}
