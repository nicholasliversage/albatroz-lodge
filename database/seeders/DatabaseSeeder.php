<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoomSeeder::class);
        $this->call(DishesSeeder::class);
        $this->call(BlogsSeeder::class);
        $this->call(UsersSeeder::class);

    }
}
