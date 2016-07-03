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
	 * @param  string $container [description]
	 * @param  string $folder    [description]
	 * @return [type]            [description]
	 */
	public function json($container = 'assets',$folder = '/')
	{
		if($this->request->ajax()){
			$container = AssetService::getContainer($container);
			$folder = $container->folder($folder);

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
				'folder'	=> $folder->toArray(),
				'assets'	=> $assets->toArray(),
				'folders'	=> $folders
			];
		}
		return null;
	}



}