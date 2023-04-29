<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('dashboard') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
         <!-- Logo -->
        </span>
        <span class="app-brand-text menu-text fw-bolder ms-2">{{ ucfirst(getSystemSettings('company_name')) }}</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>
     
    @php
      $route = Route::current()->getName();
    @endphp

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ $route == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">{{ trans('sentence.dashboard')}}</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">{{ trans('sentence.user')}}</span>
      </li>
      <li class="menu-item {{ $route == 'user' ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">{{ trans('sentence.user_management')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'user' ? 'active' : '' }}">
            <a href="{{ route('user') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence.user')}}</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Booking Section</span>
      </li>
      <li class="menu-item {{ $route == 'booked.room' ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-window-open"></i>
          <div data-i18n="Account Settings">Booking</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'booked.room' ? 'active' : '' }}">
            <a href="{{ route('booked.room') }}" class="menu-link">
              <div data-i18n="Account">Booking List</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Room Section</span>
      </li>
      <li class="menu-item @if($route == 'facility.index')
        {{ 'active open' }}
        @elseif($route == 'room.index')
        {{ 'active open' }}
        @elseif($route == 'type.index')
        {{ 'active open' }}
     @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-copy"></i>
          <div data-i18n="Account Settings">Room & Facilty</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'facility.index' ? 'active' : '' }}">
            <a href="{{ route('facility.index') }}" class="menu-link">
              <div data-i18n="Account">Facility</div>
            </a>
          </li>
          <li class="menu-item {{ $route == 'type.index' ? 'active' : '' }}">
            <a href="{{ route('type.index') }}" class="menu-link">
              <div data-i18n="Account">Room Type</div>
            </a>
          </li>
          <li class="menu-item {{ $route == 'room.index' ? 'active' : '' }}">
            <a href="{{ route('room.index') }}" class="menu-link">
              <div data-i18n="Account">Room</div>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Media Manager</span>
      </li>
      <li class="menu-item {{ $route == 'media' ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-window-open"></i>
          <div data-i18n="Account Settings">Media Manager</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'media' ? 'active' : '' }}">
            <a href="{{ route('media') }}" class="menu-link">
              <div data-i18n="Account">Media</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">{{ trans('sentence.settings')}}</span>
      </li>
       
      <li class="menu-item @if($route == 'role' || request()->is('role/*'))
         {{ 'active open' }}
         @elseif($route == 'permission')
         {{ 'active open' }}
         @elseif($route == 'settings')
         {{ 'active open' }}
         {{-- @elseif($route == 'components')
         {{ 'active open' }} --}}
      @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Account Settings">{{ trans('sentence.system_settings')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'role' || request()->is('role/*') ? 'active' : '' }}">
            <a href="{{ route('role') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence.role')}}</div>
            </a>
          </li>
          <li class="menu-item {{ $route == 'permission' ? 'active' : '' }}">
            <a href="{{ route('permission') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence.permission')}}</div>
            </a>
          </li>
          {{-- <li class="menu-item {{ $route == 'components' ? 'active' : '' }}">
            <a href="{{ route('components') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence.components')}}</div>
            </a>
          </li> --}}
          <li class="menu-item {{ $route == 'settings' ? 'active' : '' }}">
            <a href="{{ route('settings') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence.app_settings')}}</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">{{ trans('sentence.log')}}</span>
      </li>
      <li class="menu-item {{ $route == 'log' ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-check-shield"></i>
          <div data-i18n="Account Settings">{{ trans('sentence.activity_log')}}</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ $route == 'log' ? 'active' : '' }}">
            <a href="{{ route('log') }}" class="menu-link">
              <div data-i18n="Account">{{ trans('sentence._log')}}</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>