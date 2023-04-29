<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Luxury Room',
            ],
            [
                'name' => 'Delux Room',
            ],
            [
                'name' => 'Single Room',
            ],
            [
                'name' => 'Double Room',
            ]
        ];

        RoomType::insert($types);
    }
}
