<?php

namespace OneStop\Core\Support\Data\File;

abstract class Data
{


	/**
	 * Save the data
	 *
	 * @return mixed
	 */
	abstract public function save();

	/**
	 * Rename the data.
	 *
	 * @return mixed
	 */
	abstract public function rename();

	/**
	 * Delete the data.
	 *
	 * @return @mixed
	 */
	abstract public function delete();

}
