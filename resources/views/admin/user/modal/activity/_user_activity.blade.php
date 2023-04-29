<div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-5 col-lg-6 col-md-6 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-5">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class=" d-flex align-items-center flex-column">
              @if(! $user->hasImage())
              <img class="img-fluid rounded my-4" src="{{ asset('admin/assets/img/avatars/1.png') }}" height="110" width="110" alt="User avatar">
              @else 
              <img class="img-fluid rounded my-4" src="{{ $user->image->path }}" height="110" width="110" alt="User avatar">
              @endif
              <div class="user-info text-center">
                <h4 class="mb-2">{{ isset($user) ? $user->name : '' }}</h4>
                @forelse ($user->roles()->get() as $role)
                <small class="badge bg-label-success">
                  {{ ucfirst($role->name) }}
                </small>
                @empty
                <small class="text-muted">
                  {{ trans('sentence.no_role')}}
                </small>
                @endforelse
              </div>
            </div>
          </div>
           <br>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-3">
                <span class="fw-bold me-2">Phone:</span>
                <span>{{ $user->hasAddress() ? $user->address->phone : 'N/A'}}</span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Address:</span>
                <span>{{ $user->hasAddress() ? $user->address->address_line_1 : 'N/A'}}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->
  
  
    <!-- User Content -->
    <div class="col-xl-7 col-lg-7 col-md-7 order-0 order-md-1">

      <!-- Activity Timeline -->
      <div class="card mb-4">
        <h5 class="card-header">{{ trans('sentence.user_activity')}}</h5>
        <div class="card-body" style="height: 40vh; overflow-y: auto;">
          <ul class="timeline">
            @forelse($user->activity as $activity)
            <li class="timeline-item timeline-item-transparent">
                <span class="timeline-point
                @if($activity->event == 'created')
                {{'timeline-point-success'}}
                @elseif($activity->event == 'updated')
                {{ 'timeline-point-primary' }}
                @elseif($activity->event == 'deleted')
                {{ 'timeline-point-danger' }}
                @else()
                {{ 'timeline-point-info' }}
                @endif
                "></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0"></h6>
                    <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                  </div>
                  <p class="mb-2">
                    {{ $activity->auditable_type .'  '. ucfirst($activity->event) }}
                  </p>
                </div>
              </li>
            @empty
            <span>{{ trans('sentence.no_activity_found')}}</span>
            @endforelse
          </ul>
        </div>
      </div>
      <!-- /Activity Timeline -->
    </div>
    <!--/ User Content -->
  </div>