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
$factory->define(App\Core\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $faker->locale('ru_RU');

    $size = [
        'myself',
        'xsmall',
        'small',
        'medium',
        'big',
        'xbig',
    ];


    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'permissions'    => [],
        'about'          => $faker->text(1200),
        'phone'          => $faker->phoneNumber,
        'address'        => $faker->city,
        'inn'            => $faker->numberBetween(100000000, 999999999),
        'ogrn'           => $faker->numberBetween(100000000, 999999999),
        'website'        => $faker->url,
        'avatar'         => $faker->imageUrl(),
        'agent_name'     => $faker->name,
        'balance'        => rand(0, 10000),
        'specialization' => $faker->text(200),
        'size_company'   => array_rand($size),
        'city_id'        => rand(1, 2533),
    ];
});
