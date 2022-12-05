<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = Building::all();

        foreach ($buildings as $building) {
            for ($room = 1; $room <= 10; $room++) {
                Room::create([
                    "branch_id" => $building->branch->id,
                    "building_id" => $building->id,
                    "floor_no" => rand(1, $building->floor),
                    'room_number' => 100 + $room,
                    "seats" => rand(4, 20) * 5,
                    "ready" => rand(rand(0, 1), 1),
                ]);
            }
        }
    }
}
