<?php

namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;
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
		'url',
		'image_cover',
		'published',
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
	public function category()
	{
		return $this->belongsTo(VideoCategory::class);
	}

}
