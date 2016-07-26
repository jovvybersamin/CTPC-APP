<?php

namespace OneStop\Core\Videos;

use Illuminate\Support\Facades\DB;
use OneStop\Core\Videos\Video as VideoAPI;
use OneStop\Core\Models\Video as VideoModel;

class VideoService
{
	public static function getById($id)
	{
		return VideoModel::find($id);
	}

	public static function incrementHitsBySlug($slug)
	{
		DB::table('videos')->where('slug',$slug)->increment('hits');
	}

	public static function getRelatedCount(VideoAPI $video)
	{
		return DB::table('videos')
				  ->where('id','<>',$video->id())
				  ->where('category_id',$video->category())
				  ->where('status',1)
				  ->count(DB::raw('DISTINCT id'));
	}

}
