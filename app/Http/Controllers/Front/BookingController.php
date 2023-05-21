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

    public function payment(Request $request, Booking $booking)
    {   
            $to = Carbon::parse($request->check_in);
            $from = Carbon::parse($request->check_out);
            $days = $to->diffInDays($from);
            
            
            if (!$request->query('reference')) {
        
                $url = "https://api.paystack.co/transaction/initialize";

                $fields = [
                    'email' => auth()->user()->email,
                    'amount' => $days * $request->price * 100,
                    'reference' => sprintf('%s%07s%02s',now()->format('ymd'),auth()->id(), rand()),
                    'currency' => 'NGN',
                    'callback_url' => route('payment').'?room_type_id='.$request->room_type_id.'&check_in='.$request->check_in.'&check_out='.$request->check_out.'&room_id='.$request->room_id
                ];

                $fields_string = http_build_query($fields);

                //open connection
                $ch = curl_init();
                
                //set the url, number of POST vars, POST data
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY', ''),
                    "Cache-Control: no-cache",
                ));
                
                //So that curl_exec returns the contents of the cURL; rather than echoing it
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                
                //execute post
                $result = curl_exec($ch);
                return redirect(json_decode($result)->data->authorization_url);
            }
            
            DB::beginTransaction();
        
            try {
                if ($request->query->count() === 0) {
                    return redirect()->back()->with(["flash_message" => ""]);
                }
        
                $curl = curl_init();
            
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$request->query('reference'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY', ''),
                        "Cache-Control: no-cache",
                    ),
                ));
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
        
                curl_close($curl);
                
                if ($err) {
                    return "cURL Error #:" . $err;
                } else {
                    $response = json_decode($response);
                    if ($response->data->status) {
                        $storedBooking = $booking->storeBooking($request,$days);
                        
                        $storedBooking->invoice()->create([
                            'total_price' => $days * $request->price,
                            'payment_status' => 1
                        ]);
        
                        DB::commit();
                
                        session()->flash('success', 'Payment successful!');
                                
                        return redirect()->route('myBooking');
                    }
                }
    
            } catch (\Throwable $th) {
               DB::rollBack();
               return $th->getMessage();
            }
    }

   
    public function myBooking()
    {
       $user = auth()->user();
       $myBookings = $user->load('bookings.room.type');

       return view('front.booking.mybooking',compact('myBookings'));
    }
}
