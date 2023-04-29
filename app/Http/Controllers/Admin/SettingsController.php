<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\passwordUpdateRequest as UpdatePassword;
use App\Models\User;

class SettingsController extends Controller
{   
    /**
     * System Settings List
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index(Setting $setting)
    {
        return view('admin.settings.settings.settings',[
            'settings' => $setting->settings()
        ]);
    }
    
    /**
     * Update system configuration
     */
    public function update(Request $request)
    {
        $settings = Setting::select('key')->get();

        foreach ($settings as $value) {
            Setting::where('key',$value->key)->update([
                'value' => $request->key[$value->key]
            ]);
        }

        return $this->success('settings',trans('sentence.settings_updated')); 
    }

    /**
     * Clear system configuration cache
     */
    public function cache()
    {
        Artisan::call('boost:app');

        return $this->success('settings',trans('sentence.cache_cleared_message')); 
    }
    
    /**
     * Showing update password form
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function updatePasswordForm()
    {
        return view('admin.settings.settings.updatepassword');       
    }
    
    /**
     * Update password
     * 
     * @param Illuminate\Http\Request
     */
    public function updatePassword(UpdatePassword $request)
    {
        if(Hash::check($request->old_password , auth()->user()->password)) {
            if(!Hash::check($request->new_password , auth()->user()->password)) {
               $user = User::find(auth()->id());
               $user->update([
                   'password' => bcrypt($request->new_password)
               ]);
               session()->flash('message',trans('sentence.pass_updated'));
               return redirect()->back();
            }
            session()->flash('message',trans('sentence.new_pass_cant_old'));
            return redirect()->back();
        }
        session()->flash('message',trans('sentence.old_pass_not_matched'));
        return redirect()->back();
    }
}
