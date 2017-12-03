<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('ru_RU'); // create a French faker
        $now = \Carbon\Carbon::now('utc')->toDateTimeString();


        $i = 0;
        while ($i < 1000){

            try {

                /*
                $user = \App\Core\Models\User::inRandomOrder()->first();
                $user->createReview([
                    'text' => $faker->realText(400),
                ], \App\Core\Models\User::inRandomOrder()->first());
*/

                $post = \Orchid\Platform\Core\Models\Post::create([
                    'user_id' => \App\Core\Models\User::inRandomOrder()->first()->id,
                    'type' => 'tender',
                    'status' => 'publish',
                    'content' => [
                        'ru' => [
                            'city' => [
                                'id' => 1202,
                                'name' => 'Липецк',
                                'ascii_name' => 'Lipetsk',
                                'country_id' => 34,
                            ],
                            'name' => $faker->name,
                            'email' => $faker->companyEmail,
                            'phone' => $faker->phoneNumber,
                            'price' => rand(1,9999999),
                            'title' => $faker->realText(100),
                            'description' => $faker->realText(800),
                        ],
                    ],
                    'options' => [
                        'locale' => [
                            'ru' => true,
                            'en' => false,
                        ]
                    ],
                    'slug' => str_slug($faker->realText(100)),
                    'publish_at'=> time(),
                ]);
                $post->setTags([
                    $faker->jobTitle,
                    $faker->jobTitle,
                    $faker->jobTitle,
                    $faker->jobTitle,
                ]);

                $post->save();



                $size = [
                    'myself',
                    'xsmall',
                    'small',
                    'medium',
                    'big',
                    'xbig',
                ];


                $user = \App\Core\Models\User::create([
                    'name'           => $faker->company,
                    'email'          => $faker->unique()->safeEmail,
                    'password'       => $password = bcrypt('secret'),
                    'remember_token' => str_random(10),
                    'permissions'    => [],
                    'about'          => $faker->realText(1200),
                    'phone'          => $faker->phoneNumber,
                    'address'        => $faker->address,
                    'inn'            => $faker->numberBetween(100000000, 999999999),
                    'ogrn'           => $faker->numberBetween(100000000, 999999999),
                    'website'        => $faker->url,
                    'avatar'         => $faker->imageUrl(),
                    'agent_name'     => $faker->name,
                    'balance'        => rand(0, 10000),
                    'specialization' => $faker->realText(200),
                    'size_company'   => array_rand($size),
                    'city_id'        => rand(1, 2533),
                ]);


                $user->setTags([
                    $faker->title,
                    $faker->title,
                    $faker->title,
                    $faker->title,
                ]);



                $user->save();



                \Cmgmyr\Messenger\Models\Thread::create([
                    'subject' => $faker->realText()
                ]);


                \Cmgmyr\Messenger\Models\Participant::create([
                    'thread_id' => \Cmgmyr\Messenger\Models\Thread::inRandomOrder()->first()->id,
                    'user_id'   => \App\Core\Models\User::inRandomOrder()->first()->id,
                ]);

                \Cmgmyr\Messenger\Models\Message::create([
                    'thread_id' => \Cmgmyr\Messenger\Models\Thread::inRandomOrder()->first()->id,
                    'user_id'   => \App\Core\Models\User::inRandomOrder()->first()->id,
                    'body'      => $faker->realText(),
                ]);

                $i++;
            }catch (\Exception $exception){

                echo  $exception->getMessage();
                $i++;
            }

        }


        // $this->call(UsersTableSeeder::class);
        //factory(App\Core\Models\User::class, 50)->create();
        //factory(App\Core\Models\Statistics::class, 60000)->create();

        //factory(Orchid\CMS\Core\Models\Comment::class, 6000)->create();
        //factory(Orchid\CMS\Core\Models\Post::class, 6000)->create();

        //factory(App\Core\Models\Statistics::class, 60000)->create();
    }
}
