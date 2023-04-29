<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RoomBookedController extends Controller
{
    public function index(Request $request, Booking $booking)
    {   
        if ($request->ajax()) {
            $data = $booking->allBooking();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($row){ 
                        return Carbon::parse($row->created_at)->toDayDateTimeString();
                    })
                    ->addColumn('room', function ($row) {
                        return $row->room->number ?? '';
                    })
                    ->addColumn('total_price', function ($row) {
                        return $row->invoice->total_price ?? '';
                    })
                    ->addColumn('name', function ($row) {
                        return $row->user->name ?? '';
                    })
                    ->addColumn('email', function ($row) {
                        return $row->user->email ?? '';
                    })
                    ->make(true);
        }
        return view('admin.system.room.booked');
    }
}
