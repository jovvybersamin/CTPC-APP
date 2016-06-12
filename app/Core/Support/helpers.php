<?php

if(!function_exists('nav_is_active')){

	/**
	 * Wrapper for Active::if_route_pattern
	 *
	 * @param  String $route
	 * @return Boolean
	 */
	function nav_is_active($route,$forTrue = '',$forFalse = ''){
		return if_route_pattern([$route]) ?
		(empty($forTrue) ? 'active' : $forTrue) :
		(empty($forFalse) ? '' : $forFalse);
	}

}
