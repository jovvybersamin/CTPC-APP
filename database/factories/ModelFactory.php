<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(OneStop\Core\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(OneStop\Core\Models\VideoCategory::class,function(Faker\Generator $faker){
	return [
		'name'	=> $faker->name
	];
});


$factory->define(OneStop\Core\Models\Video::class,function(Faker\Generator $faker){
    return [
        'title'             => $faker->name,
        'short_description' => $faker->paragraph,
        'description'       => $faker->paragraph,
        'duration'          => '3:20',
        'source'            => $faker->url,
        'image_cover'       => $faker->url,
        'status'            => 0,
        'featured'          => 0,
        'category_id'       => OneStop\Core\Models\VideoCategory::first()->id,
        'uploaded_by'       => OneStop\Core\Models\User::first()->id,
        'created_by'        => OneStop\Core\Models\User::first()->id
    ];
});
