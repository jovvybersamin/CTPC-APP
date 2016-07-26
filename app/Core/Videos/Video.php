<?php

namespace OneStop\Core\Videos;


class Video
{

	/**
	 * [__construct description]
	 * @param [type] $properties [description]
	 */
	public function __construct($properties)
	{
		if(is_array($properties)){
			foreach ($properties as $key => $value) {
				$this->{$key} = $value;
			}
		}
	}

	/**
	 * Get the id of the video.
	 *
	 * @return int
	 */
	public function id()
	{
		return (isset($this->id) ? $this->id : null);
	}

	/**
	 * Get the category id of the video.
	 *
	 * @return int
	 */
	public function category()
	{
		return (isset($this->category_id) ? $this->category_id : null);
	}

}
