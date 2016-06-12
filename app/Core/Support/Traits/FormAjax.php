<?php

namespace OneStop\Core\Support\Traits;

use Illuminate\Http\Request;

trait FormAjax
{

	/**
	 *  Determine if the request is creating a new instance.
	 *  TODO: We can separate this to a trait.
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

	public function isEditing(Request $request,$callback){
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
