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

	/**
	 *
	 * @param  string $container [description]
	 * @param  string $path      [description]
	 * @return  array|json
	 */
	public function edit($container,$path)
	{
		$container = AssetService::getContainer($container,'local','Assets');
		$folder = $container->folder($path);
		return [
			'success'	=> true,
			'message'	=> 'Folder retrieved',
			'folder'	=> $folder->toArray()
		];
	}

	/**
	 * Update the given folder.
	 *
	 * @return
	 */
	public function update()
	{
		$container = AssetService::getContainer($this->request->get('container'), 'local', 'Assets');
		$folder = $container->folder($this->request->get('path'));
		$folder->editFolder($this->request->get('basename'));

		return [
			'success'	=>	true,
			'message'	=> 'Folder was successfully updated',
			'folder'	=> $folder->toArray()
		];

	}

	public function delete()
	{
		$container = AssetService::getContainer($this->request->get('container'), 'local', 'Assets');
		$folder = $container->folder($this->request->get('path'));

		if($folder->delete()){
			return ['success' => true];
		}
	}
}
