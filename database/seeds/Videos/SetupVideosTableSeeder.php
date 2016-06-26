<?php
namespace OneStop\Database\Seeder\Videos;

use OneStop\Core\Models\VideoCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SetupVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->truncate();

        DB::table('video_categories')->truncate();

        $category = VideoCategory::create([
        	'name'	=>	'Uncategorized',
            'slug'  => str_slug('Uncategorized')
       	]);

    }
}
