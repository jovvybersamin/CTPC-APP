<?php

namespace OneStop\Http\Controllers\Cp;

use OneStop\Core\Assets\File\AssetService;
use OneStop\Http\Controllers\CpController;

class AssetFoldersController extends CpController
{

	/**
	 * Store a new folder
	 * @return [type] [description]
	 */
	public function store()
	{
		$container = AssetService::getContainer($this->request->get('container'), 'local', 'Assets');

		$parent = $container->folder($this->request->get('parent'));

		$basename = $this->request->get('basename');

		// correct data
		// next -->
		$folder = $parent->createFolder($basename);


		if($folder){
			return [
				'success' 	=> true,
				'message'	=> 'Folder Created',
				'folder'	=> $folder->toArray()
			];
		}

		return [
			'success' => false,
			'message'	=> 'Folder is not created',
			'folder'	=> []
		];

	}

}
