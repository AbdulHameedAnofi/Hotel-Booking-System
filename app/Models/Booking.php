<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function storeBooking($request,$bookingNight)
    {
        $this->user_id = auth()->id();
        $this->room_id = $request->room_id;
        $this->check_in = $request->check_in;
        $this->check_out = $request->check_out;
        $this->booking_night = $bookingNight;
        $this->save();

        return $this;
    }

    public function allBooking()
    {
        return $this::query()->with('user','room','invoice');
    }
}
