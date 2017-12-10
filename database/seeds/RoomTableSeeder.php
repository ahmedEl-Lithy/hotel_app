<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomTableSeeder extends Seeder
{
    public function run()
    {
        //
        $room1 = new Room();
        $room1->name = '101';
        $room1->floor = '1';
        $room1->description = '101';
        $room1->save();

        $room2 = new Room();
        $room2->name = '102';
        $room2->floor = '1';
        $room2->description = '102';
        $room2->save();

        $room3 = new Room();
        $room3->name = '103';
        $room3->floor = '3';
        $room3->description = '103';
        $room3->save();
    }
}
