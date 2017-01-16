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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'number' => $faker->randomNumber(4),
        'birthdate' => $faker->dateTimeBetween('-80 years', '-20 years'),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'note' => $faker->sentence(20),
        'avatar' => 'avatar2.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
