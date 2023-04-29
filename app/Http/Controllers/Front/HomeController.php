<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Room $room)
    {   
        $rooms = $room->getAllRoom();

        return view('welcome',compact('rooms'));
    }
}
