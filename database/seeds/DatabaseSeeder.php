<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Database\Seeder\Users\SetupUsersTableSeeder;


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

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
