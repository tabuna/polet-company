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
        // $this->call(UsersTableSeeder::class);
        //factory(App\Core\Models\User::class, 50)->create();
        //factory(App\Core\Models\Statistics::class, 60000)->create();

        factory(Orchid\Core\Models\Comment::class, 6000)->create();
        //factory(Orchid\Core\Models\Post::class, 6000)->create();

        //factory(App\Core\Models\Statistics::class, 60000)->create();
    }
}
