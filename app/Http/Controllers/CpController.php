<?php

namespace OneStop\Http\Controllers;

use OneStop\Http\Controllers\Controller;

class CpController extends Controller
{

	protected $request = null;

	/**
	 *
	 * @param Request $request [description]
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}
}
