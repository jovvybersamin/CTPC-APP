<?php

namespace OneStop\Core\Assets\File;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use OneStop\Core\API\File;
use OneStop\Core\API\Path;
use OneStop\Core\Support\Data\File\Data;

class Asset extends Data implements Arrayable
{

	/**
	 * @var string
	 */
	protected $folder;


	protected $container;

	/**
	 * @var string
	 */
	protected $basename;


	protected $path;


	/**
	 * @param [type] $container [description]
	 * @param [type] $folder    [description]
	 */
	public function __construct($container,$folder,$path)
	{
		$this->container = $container;
		$this->folder = $folder;
		$this->path = $path;
	}

	/**
	 *
	 * @return [type] [description]
	 */
	public function disk()
	{
		return File::disk($this->container);
	}

	/**
	 * @return string
	 */
	public function filename()
	{
		return Path::filename($this->path());
	}

	/**
	 * @return string
	 */
	public function basename()
	{
		return basename($this->path());
	}

	/**
	 * @return string
	 */
	public function path()
	{
		return $this->path;
	}

	/**
	 * @return string
	 */
	public function url()
	{
		return '';
	}

	public function extension()
	{
		return Path::extension($this->path());
	}

	/**
	 * [isImage description]
	 * @return boolean [description]
	 */
	public function isImage()
	{
		return in_array($this->extension(),['jpg,jpeg,png,gif,bmp']);
	}

	public function lastModified()
	{
		return Carbon::createFromTimestamp($this->disk()->lastModified($this->fullPath()));
	}

	public function fullPath()
	{
		return $this->container->getPath() . $this->path();
	}

	public function size()
	{
		return $this->disk()->size($this->fullPath());
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		$array = [];

		$size = $this->size();

		$extra = [
			'title'	=>	$this->filename(),
			'url'	=> $this->url(),
			'path'	=> $this->path(),
			'filename'	=>	$this->filename(),
			'basename'	=> $this->basename(),
			'extension'	=> $this->extension(),
			'is_image'	=> $this->isImage(),
			'human_size' => $this->disk()->sizeHuman($this->fullPath()),
			'is_asset'	=> true,
			'last_modified' => (string) $this->lastModified(),
			'last_modified_timestamp' => $this->lastModified()->timestamp,
			'last_modified_instance' => $this->lastModified()
		];

		return $extra;
	}


	public function save()
	{

	}

	public function rename()
	{

	}

	public function delete()
	{

	}
}
