<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissons = [
            [
                'name' => 'MediaController@index',
                'display_name' => 'Media Manager',
                'description' => 'Media'
            ],
            [
                'name' => 'DashboardController@index',
                'display_name' => 'View Dashboard',
                'description' => 'Dashboard'
            ],
            [
                'name' => 'ProfileController@index',
                'display_name' => 'View Profile',
                'description' => 'Profile'
            ],
            [
                'name' => 'ProfileController@update',
                'display_name' => 'Update Role',
                'description' => 'Profile'
            ],
            [
                'name' => 'RoleController@index',
                'display_name' => 'View Role',
                'description' => 'Role'
            ],
            [
                'name' => 'RoleController@create',
                'display_name' => 'Create Role',
                'description' => 'Role'
            ],
            [
                'name' => 'RoleController@store',
                'display_name' => 'Store Role',
                'description' => 'Role'
            ],
            [
                'name' => 'RoleController@edit',
                'display_name' => 'Edit Role',
                'description' => 'Role'
            ],
            [
                'name' => 'RoleController@update',
                'display_name' => 'Update Role',
                'description' => 'Role'
            ],
            [
                'name' => 'RoleController@delete',
                'display_name' => 'Delete Role',
                'description' => 'Role'
            ],
            [
                'name' => 'UserController@index',
                'display_name' => 'View User',
                'description' => 'User'
            ],
            [
                'name' => 'UserController@store',
                'display_name' => 'Create User',
                'description' => 'User'
            ],
            [
                'name' => 'UserController@edit',
                'display_name' => 'Edit User',
                'description' => 'User'
            ],
            [
                'name' => 'UserController@update',
                'display_name' => 'Update User',
                'description' => 'User'
            ],
            [
                'name' => 'UserController@delete',
                'display_name' => 'Delete User',
                'description' => 'User'
            ],
            [
                'name' => 'PermissionController@index',
                'display_name' => 'View Permission',
                'description' => 'Permission'
            ],
            [
                'name' => 'PermissionController@store',
                'display_name' => 'Create Permission',
                'description' => 'Permission'
            ],
            [
                'name' => 'PermissionController@edit',
                'display_name' => 'Edit Permission',
                'description' => 'Permission'
            ],
            [
                'name' => 'PermissionController@update',
                'display_name' => 'Update Permission',
                'description' => 'Permission'
            ],
            [
                'name' => 'PermissionController@delete',
                'display_name' => 'Delete Permission',
                'description' => 'Permission'
            ],
            [
                'name' => 'ActivityLogController@index',
                'display_name' => 'Overall Activity',
                'description' => 'Activity'
            ],
            [
                'name' => 'UserController@activity',
                'display_name' => 'User Activity',
                'description' => 'Activity'
            ],
            [
                'name' => 'SettingsController@index',
                'display_name' => 'View Settings',
                'description' => 'Settings'
            ],
            [
                'name' => 'SettingsController@update',
                'display_name' => 'Update Settings',
                'description' => 'Settings'
            ],
            [
                'name' => 'SettingsController@cache',
                'display_name' => 'Cache Clear',
                'description' => 'Settings'
            ],
            [
                'name' => 'SettingsController@updatePasswordForm',
                'display_name' => 'Edit Password',
                'description' => 'Settings'
            ],
            [
                'name' => 'SettingsController@updatePassword',
                'display_name' => 'Update Password',
                'description' => 'Settings'
            ],
            [
                'name' => 'FacilityController@index',
                'display_name' => 'View Facility',
                'description' => 'Facility'
            ],
            [
                'name' => 'FacilityController@store',
                'display_name' => 'Create Facility',
                'description' => 'Facility'
            ],
            [
                'name' => 'FacilityController@edit',
                'display_name' => 'Edit Facility',
                'description' => 'Facility'
            ],
            [
                'name' => 'FacilityController@update',
                'display_name' => 'Update Facility',
                'description' => 'Facility'
            ],
            [
                'name' => 'FacilityController@delete',
                'display_name' => 'Delete Room',
                'description' => 'Room'
            ],
            [
                'name' => 'RoomController@index',
                'display_name' => 'View Room',
                'description' => 'Room'
            ],
            [
                'name' => 'RoomController@store',
                'display_name' => 'Create Room',
                'description' => 'Room'
            ],
            [
                'name' => 'RoomController@edit',
                'display_name' => 'Edit Room',
                'description' => 'Room'
            ],
            [
                'name' => 'RoomController@update',
                'display_name' => 'Update Room',
                'description' => 'Room'
            ],
            [
                'name' => 'RoomController@delete',
                'display_name' => 'Delete Room',
                'description' => 'Room'
            ],
            [
                'name' => 'TypeController@index',
                'display_name' => 'View Roomtype',
                'description' => 'Roomtype'
            ],
            [
                'name' => 'TypeController@store',
                'display_name' => 'Create Roomtype',
                'description' => 'Roomtype'
            ],
            [
                'name' => 'TypeController@edit',
                'display_name' => 'Edit Roomtype',
                'description' => 'Roomtype'
            ],
            [
                'name' => 'TypeController@update',
                'display_name' => 'Update Roomtype',
                'description' => 'Roomtype'
            ],
            [
                'name' => 'TypeController@delete',
                'display_name' => 'Delete Roomtype',
                'description' => 'Roomtype'
            ],
            [
                'name' => 'RoomBookedController@index',
                'display_name' => 'Booking List',
                'description' => 'Booking'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                            'name' => $value['name'],
                            'display_name' => $value['display_name'],
                            'description' => $value['description']
                        ]);

            User::first()->attachPermission($permission);
        }
    }
}
