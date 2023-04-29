<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{   
    /**
     * View Profile
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index()
    {
        return view('admin.user.profile');
    }
    
    /**
     * Update User Profile
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function update(User $user, ProfileUpdateRequest $request)
    {   
        $user->updateProfile($user, $request)
            ->saveAddress($request);
        
        return $this->success('profile',trans('sentence.profile_updated'));
    }
}
