<div class="plans-section" id="rooms">
    <div class="container">
    <h3 class="title-w3-agileits title-black-wthree">Rooms And Rates</h3>
       <div class="priceing-table-main">

     @forelse ($rooms as $room)
     <div class="col-md-3 price-grid">
       <div class="price-block agile">
         <div class="price-gd-top">
         <img src="{{ isset($room->image) ? $room->image->path : '' }}" alt=" " class="img-responsive" />
         </div>
         <div class="price-gd-bottom">
              <div class="price-list">
               Room Capacity: {{ $room->capacity }}
               <ul> 
                 Room Facilities:
                   @foreach ($room->facilities as $facility)
                   <br> <li>{{ $facility->name }}</li>
                   @endforeach
               </ul>
           </div>
           <div class="price-selet">	
             <h3><span>Per Night: $</span>{{ $room->price }}</h3>						
             <a href="#availability-agileits" class="scroll" >Book Now</a>
           </div>
           <h4>{{ $room->type->name ?? 'Default Room' }}</h4>
         </div>
       </div>
     </div>
     @empty
         <p>No room created yet</p>
     @endforelse
   <div class="clearfix"> </div>
     </div>
   </div>
 </div>
