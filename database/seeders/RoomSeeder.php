<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $room1 = new Room();
        $room1->name = 'Baleias';
        $room1->rooms = 4;
        $room1->description = 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.';
        $room1->price = 120.00;
        $room1->persons = 3;
        $room1->bed = 6;
        $room1->view = true;
        $room1->imgRoom = 'images/room-6.jpg';
        $room1->img1 = 'images/room-1.jpg';
        $room1->img2 = 'images/room-2.jpg';
        $room1->img3 = 'images/room-3.jpg';
        $room1->save();

        $room2 = new Room();
        $room2->name = 'Santolas';
        $room2->rooms = 4;
        $room2->description = 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.';
        $room2->price = 120.00;
        $room2->persons = 3;
        $room2->bed = 6;
        $room2->view = true;
        $room2->imgRoom = 'images/room-1.jpg';
        $room2->img1 = 'images/room-6.jpg';
        $room2->img2 = 'images/room-5.jpg';
        $room2->img3 = 'images/room-4.jpg';
        $room2->save();

        $room3 = new Room();
        $room3->name = 'Tartarugas';
        $room3->rooms = 4;
        $room3->description = 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.';
        $room3->price = 120.00;
        $room3->persons = 3;
        $room3->bed = 6;
        $room3->view = false;
        $room3->imgRoom = 'images/room-1.jpg';
        $room3->img1 = 'images/room-6.jpg';
        $room3->img2 = 'images/room-5.jpg';
        $room3->img3 = 'images/room-4.jpg';
        $room3->save();
    }
}
