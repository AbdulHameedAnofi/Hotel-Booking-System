<?php

namespace App\Models;

use App\Helpers\Imageable;
use Illuminate\Support\Str;
use App\Helpers\Addressable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, LaratrustUserTrait, AuditableTrait, Imageable, Addressable;

    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_user');
    }
    
    public function bookings() : HasMany
    {
        return $this->hasMany(Booking::class,'user_id');
    }

    public function activity() : HasMany
    {
        return $this->hasMany(Audit::class,'user_id');
    }
    
    public function storeUser($request)
    {
        $this->name = $request->name;
        $this->email = strtolower(trim($request->email));
        $this->password = bcrypt($request->password);
        $this->status = $request->status ? $request->status : 0;
        $this->remember_token = Str::random(60);
        $this->save();

        if($request->has('roles')) {
            $this->roles()->sync($request->roles);
        }

        return $this;
    }

    public function updateProfile($user, $request) : User
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        if($request->has('image')) {
            $this->saveImage($request);
        }
        
        return $this;
    }

    public function updateUser($user, $request)
    {   
        $user->update([
           'name' => $request->name,
           'email' => $request->email,
           'status' => $request->status ? $request->status : 2,
           'updated_at' => now()
        ]);

        if($request->has('roles')) {
           $user->roles()->sync($request->roles);
        }

        return $this;
    }

    public function userList()
    {
        return User::query()
                ->orderBy('name','asc')
                ->get();

    }
}
