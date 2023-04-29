<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use Closure;

class LoginController extends Controller
{
    public function loginFrom()
    {
        return view('front.auth.login');
    }

    public function register()
    {
        return view('front.auth.register');
    }

    public function processRegister(UserRegisterRequest $request, User $user)
    {   
        $user = $user->storeUser($request);
        
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->back()->with('message','Registration completed & please check your email to activate your account!');
    }

    public function veriyEmail($token)
    {
        if($token ==  null) {
            return redirect()->route('front.login')->with('message','Invalid token!');
        }

        $user = User::where('remember_token',$token)->first();

        if($user) {
            $user->update([
                'remember_token' => '',
                'status' => 1
            ]);

            return redirect()->route('front.login')->with('message','Your account is activated & now you can log in!');
        }

        return redirect()->route('front.login')->with('message','Token is invalid!');
    }

    public function login(LoginRequest $request)
    {   
        if(! $this->userExists($request->email)) {
            return $this->error('front.login', 'User does not exists!!');
        }

        $status = User::where('email',$request->email)->first()['status'];
        
        if(1 == $status){
            if (auth()->attempt($request->validated())) {
                return $this->success('welcome', 'You are logged in!');
            }
            return $this->error('front.login', 'You credentials is not matched!');
        }

        return $this->error('front.login', 'You are not an active user!!');
    }

    public function userExists($email) : bool
    {
        return User::whereEmail($email)->exists() ? true : false;
    }
}
