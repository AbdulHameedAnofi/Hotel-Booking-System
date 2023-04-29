<div class="row">
    <div class="col mb-3">
      <label for="number" class="form-label">Room Number</label><span class="bg-red"> *</span>
      <input type="text" name="number" id="number" class="form-control" placeholder="Room Number" required value="{{ isset($room) ? $room->number : ''}}">
      <div class="invalid-tooltip">This field is required</div>
    </div>
    <div class="col mb-3">
      <label for="price" class="form-label">Room Price</label><span class="bg-red"> *</span>
      <input type="text" name="price" id="price" class="form-control" placeholder="Room Price" required value="{{ isset($room) ? $room->price : ''}}">
      <div class="invalid-tooltip">This field is required</div>
    </div>
    <div class="col mb-3">
      <label for="price" class="form-label">Room Capacity</label><span class="bg-red"> *</span>
      <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Room Capacity" required value="{{ isset($room) ? $room->capacity : ''}}">
      <div class="invalid-tooltip">This field is required</div>
    </div>
  </div>
  <div class="col mb-3">
    <label for="price" class="form-label">Room Type</label><span class="bg-red"> *</span>
    <select name="room_type_id" id="room_type_id" class="form-control" required>
      <option value="" selected disabled>Select Room Type</option>
      @foreach (\App\Models\RoomType::all() as $item)
      <option value="{{ $item->id }}" {{ isset($room) ? $item->id == $room->room_type_id ? 'selected' : '' : '' }}>{{ $item->name }}</option>
      @endforeach
    </select>
    <div class="invalid-tooltip">This field is required</div>
  </div>
    @foreach(\App\Models\Facility::all() as $facility )
      <div class="col mb-0 form-inline" style="margin-top:10px;">
        <input
            type="checkbox"
            class="form-check-input"
            value="{{$facility->id}}"
            name="facility_id[]"
            @if(isset($room))
              {{ in_array($facility->id, $room->facilities->pluck('id')->toArray()) ? 'checked' : ''}}
            @endif
        />
        <label for="emailBasic" class="form-label">{{ ucfirst($facility->name) }}</label>
    </div>
    @endforeach <br><br>

  <x-file.image-component data="Room Image"/>

  <div class="col-md-12">
    @if(isset($room) && $room->hasImage())
      <img src="{{ $room->image->path }}" alt="" style="height: 100px;width:100;">
    @endif
  </div>

  <div class="col mt-3">
    <div class="form-check form-switch mb-2 form-inline">
      <input 
          class="form-check-input" 
          type="checkbox" 
          name="status"
          value="1"
          {{ isset($room) ? $room->status == 1 ? 'checked' : '' : '' }}
      >
      <label class="form-check-label">Set as active</label>
    </div>
  </div>

<div class="modal-footer">
  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
    {{ trans('sentence.close')}}
  </button>
  <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
</div>