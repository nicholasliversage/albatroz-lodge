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
        $room1->imgRoom = 'images/room-1.jpg';
        $room1->img1 = 'images/bd-1.jpg';
        $room1->img2 = 'images/bd-2.jpg';
        $room1->img3 = 'images/bd-3.jpg';
        $room1->save();
    }
}
