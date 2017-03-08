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
        'role' => $faker->randomElement(['general']),
    ];
});

$factory->define(App\Action::class, function (Faker\Generator $faker) {
    return [
        'title' 		=> 'Consejo de niños y niñas',
    	'description' 	=> 'El consejo de niños y nilas es...',
    	'admin_email' 	=> 'jeronimo.calace@gmail.com',
    	'admin_id'		=> 1,
    	'create_p'		=> 1,
    	'debate_p'		=> 1,
    	'support_p'		=> 1,
    	'opt_p'			=> 1,
    	'audit'			=> 1
    ];
});
