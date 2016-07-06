<?php

namespace OneStop\Core\Filesystem;

use Illuminate\Contracts\Filesystem\Filesystem;


class FolderAccessor
{

	/**
	 * @var string
	 */
	private $disk;

	/**
	 * @var \Illuminate\Contracts\Filesystem\Filesystem
	 */
	private $filesystem;

	/**
	 * @var [type]
	 */
	private $container;

	public function __construct($disk,$container,\Illuminate\Contracts\Filesystem\Filesystem $filesystem)
	{
		$this->disk = $disk;

		$this->container = $container;

		$this->filesystem = $filesystem;
	}

	/**
	 * @return Illuminate\Contracts\Filesystem\Filesystem
	 */
	protected function fs()
	{
		return $this->filesystem;
	}


	/**
	 * @param  string $folder
	 * @return bool
	 */
	public function exists($folder)
	{
		return $this->fs()->exists($folder);
	}

	public function createFolder($folder)
	{
		if(!$this->fs()->exists($folder)){
			return $this->fs()->makeDirectory($folder);
		}
		return false;
	}
}
