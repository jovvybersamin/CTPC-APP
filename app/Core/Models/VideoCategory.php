<?php


namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{

	protected $table = 'video_categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','slug'];


	/**
	 *
	 * @return void
	 */
	private function supplement()
	{
		$this->attributes['edit_url'] = $this->editUrl();
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
}
