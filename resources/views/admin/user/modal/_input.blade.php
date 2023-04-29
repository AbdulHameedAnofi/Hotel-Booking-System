<div class="row">
    <div class="col mb-3">
      <label for="name" class="form-label">{{ trans('sentence.name')}}</label><span class="bg-red"> *</span>
      <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required value="{{ isset($user) ? $user->name : ''}}">
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
  </div>
  <div class="row g-2">
    <div class="col mb-0">
      <label for="email" class="form-label">{{ trans('sentence.email')}}</label><span class="bg-red"> *</span>
      <input type="email" name="email" id="email" class="form-control" placeholder="john@example.com" required value="{{ isset($user) ? $user->email : ''}}">
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
    @if(! isset($user))
    <div class="col mb-0">
      <label for="password" class="form-label">{{ trans('sentence.password')}}</label><span class="bg-red"> *</span>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
    </div>
    @endif
  </div>

  <div class="col mt-3">
    <div class="form-check form-switch mb-2 form-inline">
      <input 
          class="form-check-input" 
          type="checkbox" 
          name="status"
          value="1"
          {{ isset($user) ? $user->status == 1 ? 'checked' : '' : '' }}
      >
      <label class="form-check-label">Set as an active user</label>
    </div>
  </div>

  <hr>
  <h5>{{ trans('sentence.select_role')}}</h5>
  <div class="form-inline" style="display: inline-flex;">
    @foreach (\App\Models\Role::all() as $role)
        <div class="col mb-0" style="margin-top:10px;">
            <div class="form-check form-switch mb-2 form-inline">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    name="roles[]"
                    value="{{$role->id}}"
                    @php if(isset($user_role[$role->id]) && $user_role[$role->id]) { @endphp checked @php } 
                    @endphp
                >
                <label class="form-check-label" style="margin-right:5px;">{{$role->display_name}}</label>
            </div>
        </div>
        @endforeach
    </div>

<div class="modal-footer">
  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
    {{ trans('sentence.close')}}
  </button>
  <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
</div>