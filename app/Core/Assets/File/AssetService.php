<?php

namespace OneStop\Core\Assets\File;

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

}
