<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        Facility::truncate();
        $faker = Faker::create();

        for ($i=0; $i <10 ; $i++) { 
            Facility::create([
                'name' => $faker->word,
                'status' => random_int(0,1),
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }
    }
}
