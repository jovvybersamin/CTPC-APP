<?php


namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;
use OneStop\Core\Support\Collections\VideoCollection;

class VideoCategory extends Model
{

	protected $table = 'video_categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','slug','description'];

	/**
	 * Get the videos for the given category.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function videos()
	{
		return $this->hasMany(Video::class, 'category_id');
	}

	/**
	 *
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function limitVideos($limit = 3)
	{
		return new VideoCollection($this->videos()->published()->limit($limit)->orderByRaw('RAND()')->get()->toArray());
	}

	/**
	 * [videosWithPaginate description]
	 * @return [type] [description]
	 */
	public function videosWithPaginate()
	{
		return $this->videos()->published()->paginate(15);
	}

	/**
	 *
	 * @return void
	 */
	private function supplement()
	{
		$this->attributes['edit_url'] = $this->editUrl();
		$this->attributes['url'] = $this->url();
	}

	/**
	 * Override the toArray method;
	 * TODO:: create a trait for this, since we are using this for our all model.
	 *
	 * @return void
	 */
	public function toArray()
	{
		$this->supplement();
		return parent::toArray();
	}


	/**
	 * Get the edit url for the given category.
	 *
	 * @return string
	 */
	public function editUrl()
	{
		return route('cp.videos.categories.edit',$this->slug);
	}

	/**
	 * Get the site url of the given video by slug.
	 *
	 * @return string
	 */
	public function url()
	{
		return route('video.category',$this->slug);
	}

}
