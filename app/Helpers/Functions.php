<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Audit;
use App\Enums\UserType;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

if (!function_exists('domain')) {

    /**
     * Get system domain name
     *
     * @param
     * @return
     */
    function domain() : string
    {
        return App::make('url')->to('/');
    }
}

if (!function_exists('getSystemSettings')) {

    /**
     * getting system settings
     *
     * @param string
     * 
     */
    function getSystemSettings(string $key) : string
    {
        return Setting::where('key',$key)->first()['value'];
    }
}

if (!function_exists('userActivityLog')) {

    /**
     * User activity log
     *
     * @param void
     *
     */
    function userActivityLog()
    {
        return Audit::with('user:id,name')
                    ->get();
    }
}

if (!function_exists('userRolePermissions')) {

    /**
     * Geting role wise permissions
     *
     * @param
     * @return
     */
    function userRolePermissions($roleId)
    {
        return DB::table('permission_role')
        ->where('role_id',$roleId)
        ->get();
    }
}

if (!function_exists('getUserRoleAndPermission')) {

    /**
     * All roles with permissions count
     *
     * @param
     * @return
     */
    function getUserRoleAndPermission()
    {
        return Role::withCount(['users', 'permissions'])
                ->with('users')
                ->get();
    }
}

if (!function_exists('totalUser')) {

    /**
     * Getting total users
     *
     * @param void
     *
     */
    function totalUser()
    {
        return User::count();
    }
}

if (!function_exists('activeUser')) {

     /**
     * Getting active users
     *
     * @param void
     *
     */
    function activeUser()
    {
        return User::where('status',UserType::Active)->count();
    }
}

if (!function_exists('inactiveUsers')) {

    /**
     * Getting inactive users users
     *
     * @param void
     *
     */
    function inactiveUsers()
    {
        return User::where('status',UserType::Inactive)->count();
    }
}

if (!function_exists('pendingUsers')) {

    /**
     * Getting pending users
     *
     * @param void
     *
     */
    function pendingUsers()
    {
        return User::where('status',UserType::Pending)->count();
    }
}

if (!function_exists('dropdownButton')) {

    /**
     * Getting dropdwon button link for datatable 
     *
     * @param $route
     * 
     */
    function dropdownButton($edit = '', $delete = '')
    {  
        $btn = '
            <div class="d-flex align-items-center">
                <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="'.$edit.'" class="dropdown-item">'.trans('sentence.edit').'</a>
                    <form method="POST" action="'. $delete .'">
                    <input type="hidden" name="_token" id="csrf-token" value="'.csrf_token().'" />
                    <button type="submit" class="dropdown-item delete-record text-danger show_confirm" data-toggle="tooltip" title="Delete">'.trans('sentence.delete').'</button>
                    </form>
                </div>
                </div>
            </div> ';

        return $btn;
    }
}

if (!function_exists('listButton')) {

    /**
     * Getting button link for datatable without modal
     *
     * @param $route
     * 
     */
    function listButton($edit = '', $delete = '')
    {  
        $btn = "
            <div class='action-button-inline'>
            <a href='". $edit."' class='btn btn-success btn-xs text-uppercase' style='margin-right:3px; height:20px;margin-top:2px;'>".trans('sentence.edit')."</a> 
     
            <form method='POST' action='". $delete . "'>
            <input type='hidden' name='_token' id='csrf-token' value='".csrf_token()."' />
            <button type='submit' class='btn btn-danger btn-xs text-uppercase show_confirm' data-toggle='tooltip' title='Delete'>".trans('sentence.delete')."</button>
            </form>
            </div>";

        return $btn;
    }
}

if (!function_exists('listModalButton')) {

   /**
     * Getting button link for datatable for modal
     *
     * @param $route
     * 
     */

    function listModalButton($edit = '', $delete = '')
    {  
        $btn = "
            <div class='action-button-inline'>
            <button data-toggle='modal' data-target='#myDynamicModal' data-link='". $edit . "' class='btn btn-success btn-xs text-uppercase ajax-modal-btn' style='margin-right:3px; height:20px;margin-top:2px;'>".trans('sentence.edit')."</button> 

            <form method='POST' action='".$delete."'>
            <input type='hidden' name='_token' id='csrf-token' value='".csrf_token()."' />
            <button type='submit' class='btn btn-danger btn-xs text-uppercase show_confirm' data-toggle='tooltip' title='Delete'>".trans('sentence.delete')."</button>
            </form>
            </div>";
        return $btn;
    }
}

if (!function_exists('getButtonForEdiDeleteShowModal')) {

    /**
     * Getting button link for datatable without modal along with details button
     *
     * @param $route
     * 
     */
    function getButtonForEdiDeleteShowModal($edit = '', $delete = '', $show = '')
    {  
        $btn = "
            <div class='action-button-inline'>
            <button data-toggle='modal' data-target='#myDynamicModal' data-link='". $edit . "' class='btn btn-success btn-xs text-uppercase ajax-modal-btn' style='margin-right:3px; height:20px;margin-top:2px;'>".trans('sentence.edit')."</button> 
           
            <button data-toggle='modal' data-target='#myDynamicModal' data-link='". $show . "' class='btn btn-secondary btn-xs text-uppercase ajax-modal-btn' style='margin-right:3px; height:20px;margin-top:2px;'>".trans('sentence.details')."</button> 
         
            <form method='POST' action='".$delete."'>
            <input type='hidden' name='_token' id='csrf-token' value='".csrf_token()."' />
            <button type='submit' class='btn btn-danger btn-xs text-uppercase show_confirm' data-toggle='tooltip' title='Delete' style='height:20px;margin-top:-2px;'>".trans('sentence.delete')."</button>
            </form>
            </div>";
        return $btn;
    }
}


if (!function_exists('getTotalRevenue')) {

    function getTotalRevenue()
    {  
       return Invoice::query()->select('total_price')->sum('total_price');
    }
}