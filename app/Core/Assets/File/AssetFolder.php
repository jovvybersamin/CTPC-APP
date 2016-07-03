<?php

namespace OneStop\Core\Assets\File;

use Illuminate\Support\Facades\Storage;
use OneStop\Core\API\Path;
use OneStop\Core\Assets\AssetCollection;

class AssetFolder
{

	/**
	 * @var string
	 */
	protected $container;

	/**
	 * @var array
	 */
	protected $folders = [];

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var \OneStop\Core\Assets\AssetCollection
	 */
	protected $assets = [];

	public function __construct($container,$path)
	{
		$this->container = $container;
		$this->path = $path;
	}

	public function disk()
	{

	}

	/**
	 * @return string
	 */
	public function title()
	{
		return Path::filename($this->path());
	}

	/**
	 * @return [type] [description]
	 */
	public function basename()
	{
		return basename($this->path);
	}

	/**
	 * @return string
	 */
	public function path()
	{
		return $this->path;
	}

	/**
	 * @return \OneStop\Core\Assets\AssetContainer
	 */
	public function container()
	{
		return $this->container;
	}

	 /**
	  * @return \OneStop\Core\Assets\AssetCollection
	  */
	public function assets()
	{
		$files = Storage::disk($this->container->getDriver())->files('assets' . $this->path);

		foreach ($files as $i => $file) {
			$file = str_replace('assets', '', $file);
			$this->assets[] = new Asset($this->container,$this,$file);
		}

		return new AssetCollection($this->assets);
	}

	/**
	 * @return array
	 */
	public function folders()
	{
		$folders = Storage::disk($this->container->getDriver())->directories('assets' . $this->path);
		foreach ($folders as $i => $folder) {
			$folder = str_replace('assets', '', $folder);
			$this->folders[] = new AssetFolder($this->container,$folder);
		}
		return $this->folders;
	}

	/**
	 * Get the parent folder.
	 *
	 * @return null|\OneStop\Core\Assets\File\AssetFolder
	 */
	public function parent()
	{
		if($this->path() === '/'){
			return null;
		}
		// TODO::Array pop get the last segement.
		return $this->container()->folder($this->path);
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'title' => $this->title(),
			'path'	=> $this->path(),
			'parent_folder' => $this->parent()
		];
	}



}
