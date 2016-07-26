<?php

namespace OneStop\Core\Models;

use Carbon\Carbon;
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
		'slug',
		'short_description',
		'description',
		'duration',
		'source',
		'poster',
		'status',
		'featured',
		'hits',
		'category_id',
		'uploaded_by',
		'created_by',
		'published_at'
	];

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at',
		'published_at'
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
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function creator()
	{
		return $this->belongsTo(User::class,'created_by');
	}

	/**
	 * Get the uploader/requestor/publisher of the given video.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function publisher()
	{
		return $this->belongsTo(User::class,'uploaded_by');
	}

	/**
	 * Scope a query to only include a videos with a given category.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeCategory($query,$categoryId)
	{
		return $query->where('category_id',$categoryId);
	}

	/**
	 * Scope a query to only include a featured videos.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFeatured($query)
	{
		return $query->where('featured',1);
	}

	/**
	 * Scope a query for search.
	 *
	 * @param  [type] $query   [description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function scopeSearchByKeyword($query,$keyword)
	{
		return $query->where('title','LIKE',"%{$keyword}%")
				      ->orWhere('description','LIKE',"%{$keyword}%");
	}


	/**
	 * Scope a query to only include a published videos.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopePublished($query)
	{
		return $query->where('status',1);
	}


	public function popular()
	{

	}

	public function getPublishedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
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
		$this->attributes['watch_url']	= $this->watchUrl();
		$this->attributes['category'] = $this->video_category->name;
		$this->attributes['cat'] = $this->video_category;
		$this->attributes['created_by'] = $this->creator->name;
		$this->attributes['updated_by'] = $this->getUploader();
		$this->attributes['publisher'] = $this->publisher;
		$this->attributes['human_created_at'] = $this->created_at->diffForHumans();
		$this->attributes['human_published_at'] = $this->published_at;
		$this->attributes['views'] = number_format($this->hits,0,'.',',');
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
	 *
	 * @return string
	 */
	public function watchUrl()
	{
		return route('video.watch',$this->slug);
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
