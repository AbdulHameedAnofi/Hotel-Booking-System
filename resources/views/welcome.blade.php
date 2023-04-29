@extends('front.layouts.master')

@section('centent')
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Resort <span>Inn</span></h4>
        <h5>We know what you love</h5>
        <p></p>
      </div>
    </div>
  </div>
</div>

<div id="availability-agileits">
<div class="col-md-3 book-form-left-w3layouts">
<h2>CHECK AVAILABILITY</h2>
</div>
<div class="col-md-9 book-form">
  <form action="{{ route('room.search') }}" method="get">
      <div class="fields-w3ls form-left-agileits-w3layouts ">
        <p>Room Type</p>
        <select class="form-control" name="room_type_id" required>
          <option>Select a Room</option>
          @forelse (\App\Models\RoomType::select('id','name')->get() as $item)
          <option value="{{ $item->id }}" {{ isset($request) ? $request->room_type_id == $item->id ? 'selected' : '' : '' }} >{{ $item->name }}</option>
          @empty
            <p>No room type found</p>
          @endforelse
        </select>
      </div>
      <div class="fields-w3ls form-date-w3-agileits">
          <p>Arrival Date</p>
          <input type="date" name="check_in" required="" min="{{ date('Y-m-d') }}" value="{{ isset($request) ? $request->check_in ? $request->check_in : '' : '' }}">
      </div>
      <div class="fields-w3ls form-date-w3-agileits">
          <p>Departure Date</p>
          <input type="date" name="check_out" required="" min="{{ date('Y-m-d') }}" value="{{ isset($request) ? $request->check_out ? $request->check_out : '' : ''}}">
      </div>
      
      <div class=" form-left-agileits-submit">
          <input type="submit" value="Check Availability">
      </div>
    </form>
  </div>
    <div class="clearfix"> </div>
</div>

@if(isset($request))
<!-- banner-bottom -->
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
            <th scope="col">Capacity</th>
            <th scope="col">Facility</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($rooms as $key => $room)
          <tr>
            <th scope="col">{{ $loop->index + 1 }}</th>
            <th scope="col">{{ $room->type->name ?? '' }}</th>
            <th scope="col">{{ $room->price }}</th>
            <th scope="col">{{ $room->capacity }}</th>
            <th scope="col">{{ implode(',',$room->facilities->pluck('name')->toArray()) }}</th>
            <th scope="col">
              @if(isset($booked_rooms[$key]) && $booked_rooms[$key] == $room->id)
              <span style="color: red">Booked</span>
              @else 
              <a href="{{'/complete/payment?room_type_id='.$request->room_type_id.'&check_in='.$request->check_in.'&check_out='.$request->check_out.'&price='.$room->price.'&capacity='.$room->capacity.'&room_id='.$room->id }}">
                {{ isset($booked_rooms[$key]) ? $booked_rooms[$key] == $room->id ? 'Booked' : 'Booking Now' : 'Booking Now' }}
              </a>
              @endif
            </th>
          </tr>
          @empty
          <p>No room found!</p>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endif
 <!-- rooms & rates -->
@include('front.room.room', ['rooms' => $rooms])

@include('front.contact')

@endsection
