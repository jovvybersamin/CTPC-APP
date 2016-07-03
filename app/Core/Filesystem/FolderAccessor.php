<?php

namespace OneStop\Core\Filesystem;


class FolderAccessor
{
	private $disk;
	private $filesystem;

	public function __construct($disk,\Illuminate\Contracts\Filesystem\Filesystem $filesystem)
	{
		$this->disk = $disk;
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

	public function makeDirectory($folder)
	{
		if($this->fs()->exists($folder)){

		}
	}
}
