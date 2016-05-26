<?php

namespace OneStop\Core\Support\Collections;

use Illuminate\Support\Collection as IlluminateCollection;

abstract class DataCollection extends IlluminateCollection
{

	/**
	 *
	 *
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function supplement($key,callable $callable)
	{
		if ( !is_callable($callable)) {
			return $this;
		}

		foreach ($this->items as $i => $item) {
			$this->items[$i]->setSupplement($key,call_user_func($callable));
		}

		return $this->items;
	}

}
