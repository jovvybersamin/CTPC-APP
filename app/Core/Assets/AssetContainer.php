<?php

namespace OneStop\Core\Assets;

use OneStop\Core\Assets\File\AssetFolder;

abstract class AssetContainer
{
	protected $data;

	/**
	 * @var string
	 */
	protected $driver = 'local';

	/**
	 * @var string
	 */
	protected $container;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var [type]
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $title = null;

	/**
	 * @var string
	 */
	protected $folder = '/';

	/**
	 * @var array
	 */
	protected $folders = [];


	public function url($url = null)
	{

	}

	public function setFolder()
	{

	}

	/**
	 * Get or set the container.
	 *
	 * @param  string $container
	 * @return
	 */
	public function setContainer($container)
	{
		if(is_null($this->container)){
			$this->container = $container;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContainer()
	{
		return $this->container;
	}

	/**
	 * Get or set the container driver.
	 *
	 * @param string $driver
	 * @return
	 */
	public function setDriver($driver = null)
	{
		if(!is_null($driver)){
			$this->driver = $driver;
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDriver()
	{
		return $this->driver;
	}

	/**
	 * Get or set the container title.
	 *
	 * @param  string $title
	 * @return string
	 */
	public function setTitle($title = null)
	{
		if(is_null($this->title)){
			$this->title = $title;
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->container;
	}

	/**
	 * @param \OneStop\Core\Assets\File\AssetFolder
	 */
	public function folder($folder = null)
	{
		if(!is_null($folder)){
			$this->folder = $folder;
		}
		return new AssetFolder($this,$this->folder);
	}

	public function folders()
	{

	}

	public function assets()
	{

	}
}