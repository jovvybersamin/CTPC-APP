<?php

namespace OneStop\Core\Filesystem;

/**
 * Provides methods to manipulate files.
 */
class FileAccessor
{
	/**
	 * @var [type]
	 */
	private $disk;

	/**
	 * @var [type]
	 */
	private $filesystem;

	/**
	 *
	 * @var [type]
	 */
	private $container;

	/**
	 * @const int
	 */
	const GB = 1073741824;

	/**
	 * @const int
	 */
	const MB = 1048576;

	/**
	 * @const int
	 */
	const KB = 1024;

	public function __construct($disk, $container, \Illuminate\Contracts\FileSystem\FileSystem $filesystem)
	{
		$this->disk = $disk;
		$this->container = $container;
		$this->filesystem  = $filesystem;
	}

	public function filesystem()
	{
		return $this->filesystem;
	}




	public function exists($path)
	{
		return $this->filesystem()->exists($path);
	}

	/**
	 * Get the last modified
	 *
	 * @param  [type] $file [description]
	 * @return [type]       [description]
	 */
	public function lastModified($file)
	{
		return $this->filesystem()->lastModified($file);
	}

	/**
	 * Get the file size.
	 *
	 * @param  string $file [description]
	 * @return int
	 */
	public function size($file)
	{
		return $this->filesystem()->size($file);
	}

	/**
	 * Return a file size for humans.
	 *
	 * @param  string $file [description]
	 * @return string
	 */
	public function sizeHuman($file)
	{
		$bytes = $this->size($file);

		if($bytes >= self::GB){
			$bytes = number_format($bytes / self::GB,2) . ' GB';
		} else if($bytes >= self::MB){
			$bytes = number_format($bytes / self::MB,2) . ' MB';
		} else if($bytes >= self::KB){
			$bytes = number_format($bytes / self::KB,2) . ' KB';
		} elseif($bytes > 1) {
			$bytes = number_format($bytes,2) . ' bytes';
		} else {
			$bytes = "0 byte";
		}

		return $bytes;
	}

	public function __call($method,$args)
	{
		return call_user_func_array([$this->filesystem, $method], $args);
	}

}
