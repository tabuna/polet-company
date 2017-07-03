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


$factory->define(App\Core\Models\Statistics::class, function (Faker\Generator $faker) {
    return [
        'city'     => $faker->city,
        'user_id'  => rand(0, 100),
        'guest_id' => rand(0, 100),
    ];
});


$factory->define(\Orchid\Core\Models\Post::class, function (Faker\Generator $faker) {

    \Orchid\Core\Models\Post::create([
        'user_id' => \App\Core\Models\User::orderByRaw("RAND()")->first()->id,
        'type'    => 'tender',
        'status'  => 'publish',
        'content' => [
            'ru' => [
                'title'       => $faker->text(100),
                'description' => $faker->text(400),
                'price'       => (float) rand(1, 2533878),
                'name'        => $faker->name,
                'email'       => $faker->unique()->safeEmail,
                'phone'       => $faker->phoneNumber,
                'city'        => rand(1, 2533),
            ],
        ],
        'options' => [
            'locale' => [
                'ru' => true,
                'en' => false,
            ],
        ],
        'slug'    => \Cviebrock\EloquentSluggable\Services\SlugService::createSlug(\Orchid\Core\Models\Post::class, 'slug',
            $faker->text(100)),
    ]);


    return [
        'user_id' => \App\Core\Models\User::orderByRaw("RAND()")->first()->id,
        'type'    => 'tender',
        'status'  => 'publish',
        'content' => [
            'ru' => [
                'title'       => $faker->text(100),
                'description' => $faker->text(400),
                'price'       => (float) rand(1, 2533878),
                'name'        => $faker->name,
                'email'       => $faker->unique()->safeEmail,
                'phone'       => $faker->phoneNumber,
                'city'        => rand(1, 2533),
            ],
        ],
        'options' => [
            'locale' => [
                'ru' => true,
                'en' => false,
            ],
        ],
        'slug'    => \Cviebrock\EloquentSluggable\Services\SlugService::createSlug(\Orchid\Core\Models\Post::class, 'slug',
            $faker->text(100)),
    ];
});


$factory->define(\Orchid\Core\Models\Comment::class, function (Faker\Generator $faker) {

    \Orchid\Core\Models\Comment::create([
        'post_id'   => \Orchid\Core\Models\Post::orderByRaw("RAND()")->first()->id,
        'user_id'   => \App\Core\Models\User::orderByRaw("RAND()")->first()->id,
        'parent_id' => 0,
        'content'   => $faker->text(300),
        'approved'  => 1,
    ]);


    return [
        'post_id'   => \Orchid\Core\Models\Post::orderByRaw("RAND()")->first()->id,
        'user_id'   => \App\Core\Models\User::orderByRaw("RAND()")->first()->id,
        'parent_id' => 0,
        'content'   => $faker->text(300),
        'approved'  => 1,
    ];
});


