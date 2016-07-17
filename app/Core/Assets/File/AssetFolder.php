<?php

namespace OneStop\Core\Assets\File;

use Illuminate\Support\Facades\Storage;
use OneStop\Core\API\Folder;
use OneStop\Core\API\Path;
use OneStop\Core\Assets\AssetCollection;
use OneStop\Core\Assets\File\AssetFolder;

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
		return Folder::disk($this->container);
	}

	/**
	 * @return string
	 */
	public function title()
	{
		return $this->basename();
		// return Path::filename($this->path());
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
	 * Create a new folder.
	 *
	 * @param  string $folder
	 * @return OneStop\Core\Asset\File\AssetFolder
	 */
	public function createFolder($folder)
	{
		$path = Path::assemble($this->container()->getPath(),$this->path(),$folder);
		$path = Path::fix($path);

		if($this->disk()->createFolder($path)){
			$folder = Path::fix(Path::assemble('',$this->path(),$folder));
			$folder = new AssetFolder($this->container,$folder);
			return $folder;
		}

		return false;
	}

	/**
	 * Delete the folder.
	 *
	 * @return [type] [description]
	 */
	public function delete()
	{
		return $this->disk()->deleteFolder($this->fullPath());
	}

	/**
	 * For now, we only support editing the folder name.
	 *
	 * @param string $title
	 */
	public function editFolder($title)
	{

	}


	/**
	 * @return string
	 */
	public function fullPath()
	{
		return Path::assemblePath($this->container->getPath(),$this->path(),'/');
	}

	 /**
	  * @return \OneStop\Core\Assets\AssetCollection
	  */
	public function assets()
	{
		$files = Storage::disk($this->container->getDriver())->files('assets' . $this->path);

		foreach ($files as $i => $file) {
			$file = str_replace('assets', '', $file);
			$basename = pathinfo($file)['basename'];
			$this->assets[] = new Asset($this->container,$this,$basename);
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
		$path = Path::popLastSegment($this->path());
		$path = ($path === '') ? '/' : $path;

		return $this->container()->folder($path);
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		$parent = $this->parent();

		return [
			'title' => $this->title(),
			'path'	=> Path::assemblePath('',$this->path(),'/'),
			'parent_path' => (string) $parent
		];

	}

	public function __toString()
	{
		return $this->path();
	}

}
