@extends('front.layouts.master')

@section('centent')
<div class="banner-bottom">
    <div class="container">	
      <div class="agileits_banner_bottom">
        <h3><span>All Available room from date to </h3>
      </div>
      <div class="w3ls_banner_bottom_grids">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Room Type</th>
              <th scope="col">Price</th>
              <th scope="col">Check In</th>
              <th scope="col">Check Out</th>
              <th scope="col">Booking date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($myBookings->bookings as $key => $booking)
            <tr>
              <th scope="col">{{ $loop->index + 1 }}</th>
              <th scope="col">{{ $booking->room->type->name ?? '' }}</th>
              <th scope="col">{{ $booking->room->price * $booking->booking_night }}</th>
              <th scope="col">{{ $booking->check_in }}</th>
              <th scope="col">{{ $booking->check_out }}</th>
              <th scope="col">{{ $booking->created_at->toFormattedDateString() }}</th>
              <th scope="col"><a href="{{ route('invoice',$booking->id) }}">Invoice</a></th>
            </tr>
            @empty
            <p>No room found!</p>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
