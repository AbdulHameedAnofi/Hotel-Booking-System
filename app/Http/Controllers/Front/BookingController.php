<?php

namespace App\Http\Controllers\Front;

use Stripe;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Contracts\PaymentServiceContract as Payment;
use App\Notifications\BookingNotifictaion;

class BookingController extends Controller
{
    public function checkRoomStatus(Room $room, Request $request)
    {   
        $rooms = $room->allRoomWithSpecificType($request->room_type_id);

        $booked_rooms = Booking::with('room')
                ->whereBetween('check_in',[$request->check_in,$request->check_out])
                ->whereBetween('check_out',[$request->check_in,$request->check_out])
                ->pluck('room_id');
   
        return view('welcome',compact('request','booked_rooms','rooms'));
    }

    public function payment(Request $request)
    {   
        return view('front.stripe.payment',compact('request'));
    }

    public function completeBooking(Request $request, Booking $booking)
    {
        $to = Carbon::parse($request->check_in);
        $from = Carbon::parse($request->check_out);
        $days = $to->diffInDays($from);
        
        DB::beginTransaction();
        
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $days * $request->price,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Hotel room booking by".auth()->user()->name 
            ]);

            $storedBooking = $booking->storeBooking($request,$days);
            
            $storedBooking->invoice()->create([
               'total_price' => $days * $request->price,
               'payment_status' => 1
            ]);

            $user = User::find(1);

            $data = [
                'body' => "Room no {$request->room_id} has been booked by ".auth()->user()->name
            ];
            $user->notify(new BookingNotifictaion($data));

        } catch (\Throwable $th) {
           DB::rollBack();
           return $th->getMessage();
        }

        //everything is good now
        DB::commit();

        session()->flash('success', 'Payment successful!');
              
        return redirect()->route('myBooking');
    }

    public function myBooking()
    {
       $user = auth()->user();
       $myBookings = $user->load('bookings.room.type');

       return view('front.booking.mybooking',compact('myBookings'));
    }
}
