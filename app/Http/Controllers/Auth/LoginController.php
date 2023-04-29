<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {   
        $status = User::where('email',$request->email)->first()['status'];
        
        if(1 == $status){
            if (auth()->attempt($request->validated())) {
                return $this->success('dashboard', 'You are successfully logged in!');
            }
            return $this->error('login', 'You credentials is not matched!');
        }

        return $this->error('login', 'You are not an active user!!');
    }

    public function logout()
    {
        auth()->logout();
        return $this->success('welcome','You are successfully logged out!');
    }
}
