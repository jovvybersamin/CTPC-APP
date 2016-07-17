<?php

namespace OneStop\Core\Assets;

use OneStop\Core\Assets\File\Asset;
use OneStop\Core\Assets\File\AssetService;

class AssetFactory
{

	/**
	 * @var string
	 */
	protected $container;

	/**
	 * @var string
	 */
	protected $folder;

	/**
	 * @var [type]
	 */
	protected $file;

	public function __construct()
	{

	}

	/**
	 * @return $this
	 */
	public function create()
	{
		return $this;
	}

	/**
	 * @return $this
	 */
	public function delete()
	{
		return $this;
	}

	/**
	 * @param  string $container
	 * @return $this
	 */
	public function container($container)
	{
		$this->container = $container;

		return $this;
	}

	/**
	 * @param  string $folder
	 * @return $this
	 */
	public function folder($folder)
	{
		$this->folder = $folder;
		return $this;
	}

	/**
	 * @param  string $file
	 * @return $this
	 */
	public function file($file)
	{
		$this->file = $file;
		return $this;
	}

	/**
	 * @return OneStop\Core\Assets\File\Asset
	 */
	public function get()
	{
		$container = AssetService::getContainer($this->container,'local','Assets');
		$folder = $container->folder($this->folder);
		$asset = new Asset($container,$folder,$this->file);
		return $asset;
	}

}
