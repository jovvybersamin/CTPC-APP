<?php
namespace App\Database\Seeder\Users;

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetupUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('user_roles')->truncate();

        $user = User::create([
        	'name'				=> 'Administrator',
        	'email'				=>	'jovvy.bersamin@gmail.com',
        	'username'			=>	'admin',
        	'password'			=>  bcrypt('password2016'),
        	'status'			=> 1,
        	'confirmation_code' => null,
        	'confirmed'			=> true,
        	'about'				=> null,
        	'profile'			=> null
        ]);

        $admin = Role::create([
            'name'  => 'Administrator'
        ]);

        $user->roles()->attach($admin);


    }
}
