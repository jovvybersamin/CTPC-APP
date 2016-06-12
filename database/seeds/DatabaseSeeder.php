<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use OneStop\Database\Seeder\Users\SetupUsersTableSeeder;
use OneStop\Database\Seeder\Videos\SetupVideosTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->call(SetupUsersTableSeeder::class);
        $this->call(SetupVideosTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
