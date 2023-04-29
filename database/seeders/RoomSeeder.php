<?php

namespace Database\Seeders;

use App\Models\Room;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::truncate();
        $faker = Faker::create();

        for ($i=0; $i <10 ; $i++) { 
            Room::create([
                'room_type_id' => random_int(1,4),
                'number' => random_int(10000,99999),
                'price'  => random_int(1000,9999),
                'capacity'  => random_int(1,3),
                'status' => random_int(0,1),
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }
    }
}
