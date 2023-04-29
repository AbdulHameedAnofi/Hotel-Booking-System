@extends('admin.layouts.master')

@section('title') {{ trans('sentence.account_settings')}} @endsection

@section('content')

<h4 class="fw-bold py-3 mb-4">{{ trans('sentence.account_settings')}}</h4>

<x-alert.alert-component/>

    <form 
        id="formAccountSettings" 
        method="POST" 
        action="{{ route('profile.update',auth()->id()) }}" 
        enctype="multipart/form-data"
        class="needs-validation" 
        role="form"
        novalidate
    >
    @csrf
    <div class="card mb-4">
        <h5 class="card-header">{{ trans('sentence.profile_details')}}</h5>
        <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            @if(auth()->user()->image)
            <img src="{{auth()->user()->image->path}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
            @else 
            <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
            @endif
            </div>
        </div>
        </div>

        <hr class="my-0">
        <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-6">
                <x-file.image-component data="Profile pic"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">{{ trans('sentence.name')}}</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required>
                <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">{{ trans('sentence.email')}}</label>
                <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com">
                <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="language" class="form-label">{{ trans('sentence.aa_type')}}</label>
                <select id="language" class="select2 form-select custom-select" name="address_type">
                    <option value="" selected disabled>{{ trans('sentence.select_address')}}</option>
                    <option value="Primary" 
                    @if(auth()->user()->hasAddress())
                    {{ auth()->user()->address->address_type == 'Primary' ? 'selected' : '' }}
                    @endif
                    >Primary</option>
                    <option value="Permanent" 
                    @if(auth()->user()->hasAddress())
                    {{ auth()->user()->address->address_type == 'Permanent' ? 'selected' : '' }}
                    @endif
                    >Permanent</option>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="phoneNumber">{{ trans('sentence.phone')}}</label>
                <div class="input-group input-group-merge">
                <span class="input-group-text">BD (+088)</span>
                <input type="text" id="phoneNumber" name="phone" class="form-control" placeholder="202 555 0111" value="{{ auth()->user()->hasAddress() ?
                    auth()->user()->address->phone : ''}}">
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="address" class="form-label">{{ trans('sentence.a_line_one')}}</label>
                <input type="text" class="form-control" id="address" name="address_line_1" placeholder="Address" value="{{ auth()->user()->hasAddress() ?
                    auth()->user()->address->address_line_1 : ''}}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="state" class="form-label">{{ trans('sentence.a_line_two')}}</label>
                <input class="form-control" type="text" id="state" name="address_line_2" placeholder="California" value="{{ auth()->user()->hasAddress() ?
                    auth()->user()->address->address_line_2 : ''}}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="state" class="form-label">{{ trans('sentence.city')}}</label>
                <input class="form-control" type="text" id="state" name="city" placeholder="California" value="{{ auth()->user()->hasAddress() ?
                    auth()->user()->address->city : ''}}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="zipCode" class="form-label">{{ trans('sentence.zip_code')}}</label>
                <input type="text" class="form-control" id="zipCode" name="zip_code" placeholder="231465" maxlength="6" value="{{ auth()->user()->hasAddress() ?
                    auth()->user()->address->zip_code : ''}}">
            </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">{{ trans('sentence.save_changes')}}</button>
            </div>
        </div>
    </div>
</form>
@endsection
