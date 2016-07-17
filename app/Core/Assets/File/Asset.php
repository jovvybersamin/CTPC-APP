<?php

namespace OneStop\Core\Assets\File;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use OneStop\Core\API\File;
use OneStop\Core\API\Path;
use OneStop\Core\API\Str;
use OneStop\Core\Assets\AssetFactory;
use OneStop\Core\Support\Data\File\Data;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class Asset extends Data implements Arrayable
{

	/**
	 * @var OneStop\Core\Assets\File\AssetFolder
	 */
	protected $folder;

	/**
	 * @var OneStop\Core\Assets\File\AssetContainer
	 */
	protected $container;

	/**
	 * @var string
	 */
	protected $basename;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @param OneStop\Core\Assets\File\AssetContainer $container
	 * @param OneStop\Core\Assets\File\AssetFolder $folder
	 * @param string $path [filename]
	 */
	public function __construct($container,$folder,$path)
	{
		$this->container = $container;
		$this->folder = $folder;
		$this->path = $path;
	}


	/**
	 *
	 * @return [type] [description]
	 */
	public function disk()
	{
		return File::disk($this->container());
	}

	public function driver()
	{
		return $this->container()->getDriver();
	}

	/**
	 * @return string
	 */
	public function filename()
	{
		return Path::filename($this->path());
	}

	/**
	 * @return string
	 */
	public function basename()
	{
		return basename($this->path());
	}

	/**
	 * @return string
	 */
	public function path()
	{
		return $this->path;
	}

	public function container()
	{
		return $this->container;
	}

	public function folder()
	{
		return $this->folder;
	}

	/**
	 * @return string
	 */
	public function url()
	{
		if($this->driver() === 'local'){
			$url = $this->container()->url() . '/' . Str::removeLeft($this->folder()->path(),'/') . '/' .  $this->path();
			return Path::fix($url);
		}
	}

	/**
	 * Upload a file.
	 *
	 * @param  UploadedFile $file [description]
	 * @return [type]             [description]
	 */
	public function upload(UploadedFile $file)
	{
		$basename 	= $file->getClientOriginalName();
		$filename 	= pathinfo($basename)['filename'];
		$ext 		= $file->getClientOriginalExtension();

		$directory = Str::removeLeft($this->folder()->path(),'/');
		$container = $this->container()->getPath();

		$path = Path::assemble($container,$directory,$filename . '.' . $ext);

		// if the file already exists, we'll append a timestamp to prevent overwriting.
		if($this->disk()->exists($path)){
			$basename = $filename . '-' . time() . '.' . $ext;
			$path = Path::assemble($container,$directory,$basename);
		}

		$stream = fopen($file->getRealPath(),'r+');
		$this->disk()->put($path,$stream);
		fclose($stream);

		$this->basename = $basename;
		$this->path = $basename;
	}

	public function delete()
	{
		$directory = Str::removeLeft($this->folder()->path(),'/');
		$container = $this->container()->getPath();
		$path = Path::assemble($container,$directory,Str::removeLeft($this->path(),'/'));

		if($this->disk()->exists($path)){
			return $this->disk()->delete($path);
		}

		throw new Exception('File not found.');
	}





	/**
	 * @return string
	 */
	public function extension()
	{
		return Path::extension($this->path());
	}

	/**
	 * @return boolean
	 */
	public function isImage()
	{
		return in_array($this->extension(),['jpg,jpeg,png,gif,bmp']);
	}

	/**
	 * @return
	 */
	public function lastModified()
	{
		return Carbon::createFromTimestamp($this->disk()->lastModified($this->fullPath()));
	}

	/**
	 * @return string
	 */
	public function fullPath()
	{
		return $this->container()->getPath() . $this->folder()->path()  . '/' . Str::removeLeft($this->path(),'/');
	}

	/**
	 * @return int
	 */
	public function size()
	{
		return $this->disk()->size($this->fullPath());
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		$array = [];

		$size = $this->size();

		$extra = [
			'title'	=>	$this->filename(),
			'url'	=> $this->url(),
			'path'	=> $this->path(),
			'filename'	=>	$this->filename(),
			'basename'	=> $this->basename(),
			'extension'	=> $this->extension(),
			'is_image'	=> $this->isImage(),
			'human_size' => $this->disk()->sizeHuman($this->fullPath()),
			'is_asset'	=> true,
			'last_modified' => (string) $this->lastModified(),
			'last_modified_timestamp' => $this->lastModified()->timestamp,
			'last_modified_instance' => $this->lastModified()
		];

		return $extra;
	}


	public function save()
	{

	}

	public function rename()
	{
		//
	}



	public function deleteMany()
	{

	}

}
