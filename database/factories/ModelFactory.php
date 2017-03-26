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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => 'general',
    ];
});

$factory->define(App\Action::class, function (Faker\Generator $faker) {
    return [
        'title' 		=> $faker->sentence,
    	'description' 	=> $faker->text,
    	'admin_email' 	=> $faker->safeEmail,
    	'admin_id'		=> 1,
    	'create_p'		=> rand(0,1),
    	'debate_p'		=> rand(0,1),
    	'support_p'		=> rand(0,1),
    	'opt_p'			=> rand(0,1),
    	'audit'			=> rand(0,1)
    ];
});

$factory->define(App\Proposal::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->sentence,
        'content'       => $faker->text,
        'action_id'     => 1,
        'user_id'    => 1
    ];
});
