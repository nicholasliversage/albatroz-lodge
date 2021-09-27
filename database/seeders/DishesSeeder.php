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
        $dish1->imgDish = 'images/menu-6.jpg';
        $dish1->description = 'A small river named Duden flows by their place and supplies';
        $dish1->special = true;
        $dish1->category = 'main';
        $dish1->price = 120.00;
        $dish1->save();

        $dish2 = new Dishes();
        $dish2->name = 'Grilled Salmon with Rice';
        $dish2->imgDish = 'images/menu-5.jpg';
        $dish2->description = 'A small river named Duden flows by their place and supplies';
        $dish2->special = true;
        $dish2->category = 'main';
        $dish2->price = 120.00;
        $dish2->save();

        $dish3 = new Dishes();
        $dish3->name = 'Fruit Salad';
        $dish3->imgDish = 'images/menu-2.jpg';
        $dish3->description = 'A small river named Duden flows by their place and supplies';
        $dish3->special = true;
        $dish3->category = 'dessert';
        $dish3->price = 120.00;
        $dish3->save();

        $dish4 = new Dishes();
        $dish4->name = 'Bacon & Eggs';
        $dish4->imgDish = 'images/menu-3.jpg';
        $dish4->description = 'A small river named Duden flows by their place and supplies';
        $dish4->special = false;
        $dish4->category = 'breakfast';
        $dish4->price = 120.00;
        $dish4->save();

        $dish5 = new Dishes();
        $dish5->name = 'Omelete & Toast';
        $dish5->imgDish = 'images/menu-4.jpg';
        $dish5->description = 'A small river named Duden flows by their place and supplies';
        $dish5->special = false;
        $dish5->category = 'breakfast';
        $dish5->price = 120.00;
        $dish5->save();

        $dish6 = new Dishes();
        $dish6->name = 'Calamari & Chips';
        $dish6->imgDish = 'images/menu-9.jpg';
        $dish6->description = 'A small river named Duden flows by their place and supplies';
        $dish6->special = false;
        $dish6->category = 'main';
        $dish6->price = 120.00;
        $dish6->save();

        $dish7 = new Dishes();
        $dish7->name = 'Slice of Cake';
        $dish7->imgDish = 'images/menu-1.jpg';
        $dish7->description = 'A small river named Duden flows by their place and supplies';
        $dish7->special = false;
        $dish7->category = 'dessert';
        $dish7->price = 120.00;
        $dish7->save();

        $dish8 = new Dishes();
        $dish8->name = '1/4 Chicken & Chips';
        $dish8->imgDish = 'images/menu-9.jpg';
        $dish8->description = 'A small river named Duden flows by their place and supplies';
        $dish8->special = false;
        $dish8->category = 'main';
        $dish8->price = 120.00;
        $dish8->save();

        $dish9 = new Dishes();
        $dish9->name = 'T-Bone with rice & chips';
        $dish9->imgDish = 'images/menu-4.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'main';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Pork Chops with rice & chips';
        $dish9->imgDish = 'images/menu-4.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'main';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Waffles & Ice Cream';
        $dish9->imgDish = 'images/menu-2.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = true;
        $dish9->category = 'breakfast';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Pancakes With lemon, sugar & honey';
        $dish9->imgDish = 'images/menu-3.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'breakfast';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Barracuda with Chips & Rice';
        $dish9->imgDish = 'images/menu-2.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'main';
        $dish9->price = 120.00;
        $dish9->save();


        $dish9 = new Dishes();
        $dish9->name = 'Crayfish with Chips & Rice';
        $dish9->imgDish = 'images/menu-6.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'main';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Bread Pudding';
        $dish9->imgDish = 'images/menu-2.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'dessert';
        $dish9->price = 120.00;
        $dish9->save();

        $dish9 = new Dishes();
        $dish9->name = 'Cremora Tart';
        $dish9->imgDish = 'images/menu-1.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'dessert';
        $dish9->price = 120.00;
        $dish9->save();

        
        $dish9 = new Dishes();
        $dish9->name = 'Bread Pudding';
        $dish9->imgDish = 'images/menu-2.jpg';
        $dish9->description = 'A small river named Duden flows by their place and supplies';
        $dish9->special = false;
        $dish9->category = 'dessert';
        $dish9->price = 120.00;
        $dish9->save();



    }
}
