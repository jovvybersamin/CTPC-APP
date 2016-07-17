<?php

namespace OneStop\Http\Controllers;

use Illuminate\Http\Request;
use OneStop\Http\Controllers\Controller;

class SiteController extends Controller
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
