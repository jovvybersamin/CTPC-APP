<?php

namespace OneStop\Core\Assets\File;

use OneStop\Core\Assets\AssetFactory;
use OneStop\Core\Assets\File\AssetContainer;

class AssetService
{


	/**
	 * Get the container by its name.
	 *
	 * @param  string $container
	 * @return
	 */
	public static function getContainer($container,$driver = 'local',$title = 'Assets')
	{
		$assetContainer = new AssetContainer();
		$assetContainer->setTitle($title)
				  		->setContainer($container)
				  		->setDriver($driver);
		return $assetContainer;
	}


	/**
	 * @return OneStop\Core\Assets\AssetFactory
	 */
	public static function factory()
	{
		return new AssetFactory();
	}

	/**
	 * @return OneStop\Core\Assets\AssetFactory
	 */
	public static function asset()
	{
		return self::factory();
	}

	/**
	 * @return OneStop\Core\Assets\AssetFactory
	 */
	public static function createAsset()
	{
		return self::factory()->create();
	}

	/**
	 * @return OneStop\Core\Assets\AssetFactory
	 */
	public function deleteAsset()
	{
		return self::factory()->delete();
	}

}
