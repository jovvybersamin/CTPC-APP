<?php
namespace OneStop\Database\Seeder\Users;

use OneStop\Core\Models\Role;
use OneStop\Core\Models\User;
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

        $admin_user = User::create([
        	'name'				=> 'Administrator',
        	'email'				=>	'jovvybersamin99@gmail.com',
        	'username'			=>	'admin',
        	'password'			=>  bcrypt('password2016'),
        	'status'			=> 1,
        	'confirmation_code' => null,
        	'confirmed'			=> true,
        	'about'				=> null,
        	'profile'			=> null
        ]);

        $super_user = User::create([
            'name'              => 'Super User',
            'email'             =>  'jovvy.bersamin@gmail.com',
            'username'          =>  'superuser2016',
            'password'          =>  bcrypt('password2016'),
            'status'            => 1,
            'confirmation_code' => null,
            'confirmed'         => true,
            'about'             => null,
            'profile'           => null,
            'deletable'        => false
        ]);

        $admin_role = Role::create([
            'name'  => 'Administrator'
        ]);

        $discount_prov_user = Role::create([
            'name'  => 'Discount Provider'
        ]);

        $user_role = Role::create([
            'name'  => 'User'
        ]);

        $super_user->roles()->attach($admin_role);

        $admin_user->roles()->attach($admin_role);


    }
}
