<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(SystemSettingsSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class);
    }
}
