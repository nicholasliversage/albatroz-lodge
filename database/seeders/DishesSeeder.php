<?php

namespace Database\Seeders;
use App\Models\Dishes;
use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dish1 = new Dishes();
        $dish1->name = 'Grilled Crab with Onion';
        $dish1->imgDish = 'images/menu-3.jpg';
        $dish1->description = 'A small river named Duden flows by their place and supplies';
        $dish1->price = 120.00;
        $dish1->save();
    }
}
