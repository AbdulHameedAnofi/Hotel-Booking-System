<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice(Booking $booking)
    {  
        $booking = $booking->load('invoice');

        return view('invoice',compact('booking'));
    }
}
