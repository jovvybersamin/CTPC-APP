<?php

namespace OneStop\Core\Support\Collections;

use OneStop\Core\Support\Collections\DataCollection;

class VideoCollection extends DataCollection
{
	/**
	 * @var array
	 */
	protected $ids = array();


	public function getIds()
	{
		$ids = [];

		foreach ($this->all() as $value) {
			array_push($ids,$value['id']);
		}

		return $ids;
	}


	public function testIds()
	{
		$ids = [];

		foreach ($this->all() as $value) {
			array_push($ids,$value['id']);
		}

		return $ids;
	}

}
