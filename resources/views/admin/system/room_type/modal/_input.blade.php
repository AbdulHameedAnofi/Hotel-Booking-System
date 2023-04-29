<div class="row">
    <div class="col mb-3">
      <label for="name" class="form-label">Room Type Name</label><span class="bg-red"> *</span>
      <input type="text" name="name" id="name" class="form-control" placeholder="Room type name" required value="{{ isset($roomType) ? $roomType->name : ''}}">
      <div class="invalid-tooltip">This field is required</div>
    </div>
  </div>

<div class="modal-footer">
  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
    {{ trans('sentence.close')}}
  </button>
  <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
</div>