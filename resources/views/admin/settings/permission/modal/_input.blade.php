  
  <div class="row">
    <div class="col mb-3">
      <label for="name" class="form-label">{{ trans('sentence.name')}}</label><span class="bg-red"> *</span>
      <input type="text" name="name" id="name" class="form-control" placeholder="DashboardController@index" required value="{{ isset($permission) ? $permission->name : ''}}">
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
  </div>
  <div class="row g-2">
    <div class="col mb-0">
      <label for="display_name" class="form-label">{{ trans('sentence.display_name')}}</label><span class="bg-red"> *</span>
      <input type="text" name="display_name" id="display_name" class="form-control" placeholder="View Dashboard" required value="{{ isset($permission) ? $permission->display_name : ''}}">
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
    <div class="col mb-0">
      <label for="description" class="form-label">{{ trans('sentence.description')}}</label><span class="bg-red"> *</span>
      <input type="text" name="description" id="description" class="form-control" placeholder="Dashboard" required value="{{ isset($permission) ? $permission->description : ''}}">
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
  </div>
<div class="modal-footer">
  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
    {{ trans('sentence.close')}}
  </button>
  <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
</div>