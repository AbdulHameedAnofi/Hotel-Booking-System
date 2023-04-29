@extends('admin.layouts.master')

@section('title') {{ trans('sentence.update_password')}} @endsection

@section('content')

<h4 class="fw-bold py-3 mb-4">{{ trans('sentence.update_password')}}</h4>

    <div class="alert alert-warning fa-window-close" role="alert">
        <h6 class="alert-heading fw-bold mb-2">{{ trans('sentence.warning')}}</h6>
        <p class="mb-0">{{ trans('sentence.warning_password')}}</p>
    </div>

    <x-alert.alert-component />

    <div class="card">
        <div class="card-body">
            <form 
            action="{{ route('update.password') }}" 
            method="post" 
            class="needs-validation" 
            role="form"
            novalidate
        >
        @csrf
        <div class="row">
            <div class="col mb-3">
                <label for="nameBasic" class="form-label">{{ trans('sentence.pre_pass')}}</label>
                <input 
                    type="text" 
                    name="old_password" 
                    class="form-control" 
                    placeholder="{{ trans('sentence.pre_pass')}}"
                    required 
                >
                <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
            <div class="col mb-3">
            <label for="nameBasic" class="form-label">{{ trans('sentence.new_pass')}}</label>
            <input 
                type="text" 
                name="new_password" 
                class="form-control" 
                placeholder="{{ trans('sentence.new_pass')}}"
                required 
            >
            <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
        </div>
        <div class="col mb-3">
            <label for="nameBasic" class="form-label">{{ trans('sentence.confirm_pass')}}</label>
            <input 
                type="text" 
                name="password_confirmation" 
                class="form-control" 
                placeholder="{{ trans('sentence.confirm_pass')}}"
                required 
            >
            <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
        </div>
        </div> 
    
        <div class="fw-bold py-1 mt-3">
            <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
        </div>
        </div>
    </div>
@endsection