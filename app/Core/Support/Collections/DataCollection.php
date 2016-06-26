<?php

namespace OneStop\Core\Support\Collections;

use Illuminate\Support\Collection as IlluminateCollection;

abstract class DataCollection extends IlluminateCollection
{

	/**
	 *
	 *
	 *
	 * @param  [string]   $key      [description]
	 * @param  callable $callable [description]
	 * @return [type]             [description]
	 */
	public function supplement($key,callable $callable)
	{
		if ( !is_callable($callable)) {
			return $this;
		}

		foreach ($this->items as $i => $item) {
			if(is_array($item)) {
				$this->items[$i][$key] = call_user_func($callable);
			}elseif($item instanceof \Illuminate\Database\Eloquent\Model){
				$this->items[$i]->setSupplement($key,call_user_func($callable));
			}
		}

		return $this->items;
	}

}
