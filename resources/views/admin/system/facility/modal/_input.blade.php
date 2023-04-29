<div class="row">
    <div class="col mb-3">
      <label for="name" class="form-label">{{ trans('sentence.name')}}</label><span class="bg-red"> *</span>
      <input type="text" name="name" id="name" class="form-control" placeholder="Fridge.." required value="{{ isset($facility) ? $facility->name : ''}}">
      <div class="invalid-tooltip">This field is required</div>
    </div>
  </div>

  <div class="col mt-3">
    <div class="form-check form-switch mb-2 form-inline">
      <input 
          class="form-check-input" 
          type="checkbox" 
          name="status"
          value="1"
          {{ isset($facility) ? $facility->status == 1 ? 'checked' : '' : '' }}
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