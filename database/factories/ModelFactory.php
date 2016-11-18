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

$factory->define(App\Family::class, function (Faker\Generator $faker) {

    return [
        'id' => $faker->uuid(),
        'name' => $faker->lastName,
        'created_by' => '1',
        'updated_by' => '1',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $family_ids = App\Family::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('111111'),
        'remember_token' => str_random(10),
        'family_id'=> $faker->randomElement($family_ids),
    ];
});


