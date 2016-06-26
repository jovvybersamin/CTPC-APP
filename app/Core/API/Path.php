<?php

namespace OneStop\Core\API;

use League\Flysystem\Util;


/**
 * methods for file paths.
 */
class Path
{


	public function normalizeRelativePath($path)
	{
		return Util::normalizeRelativePath($path);
	}

}
