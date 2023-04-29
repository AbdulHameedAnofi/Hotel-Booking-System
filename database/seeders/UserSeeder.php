<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@demo.com';
        $user->password = bcrypt('123456');
        $user->created_at = now();
        $user->status = 1;
        $user->save();
    }
}
