<?php

namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;
use OneStop\Core\Models\User;
use OneStop\Core\Models\VideoCategory;

class Video extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'short_description',
		'description',
		'duration',
		'source',
		'image_cover',
		'status',
		'featured',
		'category_id',
		'uploaded_by',
		'created_by'
	];

	/**
	 * The associated video category for the given video.
	 *
	 * @return [\Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function video_category()
	{
		return $this->belongsTo(VideoCategory::class,'category_id');
	}

	/**
	 * The user who created the given video.
	 *
	 * @return [\Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function creator()
	{
		return $this->belongsTo(User::class,'created_by');
	}


	/**
	 * The uploader or the requestor of the given vide.
	 *
	 * @return [\Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function uploader()
	{
		return $this->belongsTo(User::class,'updated_by');
	}

	/**
	 * Add additional attributes
	 *
	 * @return void
	 */
	public function supplements()
	{
		$this->attributes['edit_url'] = $this->editUrl();
		$this->attributes['category'] = $this->video_category->name;
		$this->attributes['created_by'] = $this->creator->name;
		$this->attributes['updated_by'] = $this->getUploader();
	}

	/**
	 * Override the parent method to call the supplements method.
	 *
	 * @return array
	 */
	public function toArray()
	{
		$this->supplements();
		return parent::toArray();
	}

	/**
	 * The edit url link of the given video.
	 *
	 * @return string
	 */
	public function editUrl()
	{
		return route('cp.videos.edit',$this->id);
	}

	/**
	 * Get the uploader or requestor name
	 *
	 * @return string
	 */
	public function getUploader()
	{
		return ($this->uploader) ? $this->uploader->name : '';
	}
}
