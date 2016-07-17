<?php

namespace OneStop\Http\Controllers\Cp;

use OneStop\Core\Assets\File\AssetService;
use OneStop\Http\Controllers\CpController;

class AssetsController extends CpController
{

	/**
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function index()
	{
		return redirect()->route('cp.assets.browse','assets');
	}

	/**
	 *
	 * @param  [type] $container [description]
	 * @param  string $folder    [description]
	 * @return [type]            [description]
	 */
	public function browse($container = 'assets', $folder = '/')
	{
		return view('cp.assets.browse',compact('container','folder'));
	}

	/**
	 *
	 * @return JSON|string
	 */
	public function json()
	{
		$container = $this->request->get('container');

		$path = $this->request->get('path');

		$path = ($path === '') ? '/' : $path;


		if($this->request->ajax()){
			$container = AssetService::getContainer($container);

			$folder = $container->folder($path);

			$assets = $folder->assets();

			$folders = [];

			foreach ($folder->folders() as $f) {
				$folders[] = [
					'path'	=>	$f->path(),
					'title'	=>	$f->title()
				];
			}

			return [
				'container'	=>	$container->getContainer(),
				'folder'	=> 	$folder->toArray(),
				'assets'	=> 	$assets->toArray(),
				'folders'	=> 	$folders
			];
		}
		return null;
	}

	/**
	 * Store a new file.
	 *
	 * @return JSON
	 */
	public function store()
	{
		if( ! $this->request->hasFile('file')){
			return response()->json('No file specified.',400);
		}

		$asset = AssetService::asset()
							->container($this->request->container)
							->folder($this->request->folder)
							->get();

		try{
			$asset->upload($this->request->file('file'));
		}catch(FileException $e){
			$error = 'There was an error uploading the file: ' . $e->getMessage();
			return response()->json($error,400);
		}


		// TODO:: add image manipulation if the asset is an image.
		return response()->json([
			'success'	=> true,
			'asset'		=> $asset->toArray()
		]);

	}

	/**
	 * Delete the given file.
	 *
	 * @return
	 */
	public function delete()
	{

		$asset = AssetService::asset()
						->container($this->request->container)
						->folder($this->request->folder)
						->file($this->request->paths[0])
						->get();

		try{
			$asset->delete();
		}catch(Exception $e){
			$error = 'There was an error deleting the given file: ' . $e->getMessage();
			return response()->json($error,400);
		}

		return ['success' => true];
	}


}
