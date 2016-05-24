<?php



if(!function_exists('nav_is')){

	/**
	 * Wrapper for Active::if_route_pattern
	 *
	 * @param  String $route
	 * @return Boolean
	 */
	function nav_is($route){
		return if_route_pattern([$route]);
	}

}
