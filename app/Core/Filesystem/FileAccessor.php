<?php

namespace OneStop\Core\Filesystem;

/**
 * Provides methods to manipulate files.
 */
class FileAccessor
{
	private $disk;

	private $filesystem;

	private $container;

	public function __construct($disk, \Illuminate\Contracts\FileSystem\FileSystem $filesystem)
	{
		$this->disk = $disk;
		$this->filesystem  = $filesystem;
	}

	public function filesystem()
	{
		return $this->filesystem;
	}

	/**
	 * Get the last modified
	 *
	 * @param  [type] $file [description]
	 * @return [type]       [description]
	 */
	public function lastModified($file)
	{
		return $this->filesystem()->lastModified($this->container . $file);
	}

}
