<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'display_name' => 'Company Name',
                'key' => 'company_name',
                'value' => 'Hotel Booking'
            ],
            [
                'display_name' => 'Company Email',
                'key' => 'company_email',
                'value' => 'support@ceptruck.com'
            ],
            [
                'display_name' => 'Set Timezone',
                'key' => 'set_timezone',
                'value' => config('app.timezone')
            ],
            [
                'display_name' => 'Company Address',
                'key' => 'address',
                'value' => 'Dhaka/Bangladesh'
            ],
            [
                'display_name' => 'Phone',
                'key' => 'phone',
                'value' => '01764908494'
            ]
        ];

        Setting::insert($data);  
    }
}
