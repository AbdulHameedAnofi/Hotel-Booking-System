@extends('admin.layouts.master')

@section('title') {{ trans('sentence.system_settings')}} @endsection

@section('content')

<x-alert.alert-component/>

<h4 class="fw-bold py-3 mb-4">{{ trans('sentence.system_settings')}}</h4>
    <div class="alert alert-warning" role="alert">
        <h6 class="alert-heading fw-bold mb-2">{{ trans('sentence.warning')}}</h6>
        <p class="mb-0">{{ trans('sentence.by_edit_settings')}}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card">
                    <div class="card-body">
                     <form 
                     action="{{ route('settings') }}" 
                     method="post" 
                     class="needs-validation" 
                     role="form"
                     novalidate
                 >
                 @csrf
                 @method('patch')
                 @forelse($settings as $setting)
                 <div class="row">
                     <div class="col mb-3">
                         <label for="nameBasic" class="form-label">{{ $setting->display_name }}</label>
                         <input 
                             type="text" 
                             name="key[{{ $setting->key }}]" 
                             class="form-control" 
                             value="{{ $setting->value }}"
                             placeholder="{{ $setting->display_name }}"
                             required 
                         >
                         <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
                     </div>
                 </div> 
                 @empty
                 <p></p>
                 @endforelse
                 <div class="fw-bold py-1 mt-3">
                     <button type="submit" class="btn btn-primary">{{ trans('sentence.save_changes')}}</button>
                 </div>
                 </div>
             </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">{{ trans('sentence.clear_system_cache')}}</h5>
                <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-success">
                    <p class="mb-0">{{ trans('sentence.clear_cache')}}</p>
                    </div>
                </div>
                    <a href="{{ route('cache') }}" class="btn btn-danger deactivate-account">{{ trans('sentence.clear')}}</a>
                </div>
            </div> 
        </div>
    </div>
@endsection