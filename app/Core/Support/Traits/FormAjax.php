<?php

namespace OneStop\Core\Support\Traits;

use Illuminate\Http\Request;

trait FormAjax
{

	/**
	 *  Determine if the request is creating a new instance.
	 *
	 *
	 * @param  Request $request [description]
	 * @return Array
	 */
	public function isCreating(Request $request,callable $callback){
		if($request->ajax()){

			$return = [
				'type' => 'store'
			];

			if(is_callable($callback)){
				$return = array_merge($return,call_user_func($callback,[true]) ?: []);
			}

			return $return;
		}
		return false;
	}

	/**
	 *
	 * @param  Request $request  [description]
	 * @param  callable  $callback [description]
	 * @return boolean           [description]
	 */
	public function isEditing(Request $request,callable $callback){
		if($request->ajax()){

			$return = [
				'type' => 'update'
			];

			if(is_callable($callback)){
				$return = array_merge($return,call_user_func($callback,[true]) ?: []);
			}

			return $return;
		}
		return false;
	}

}
