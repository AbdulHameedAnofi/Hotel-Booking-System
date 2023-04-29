@extends('admin.layouts.master')

@section('title') {{ trans('sentence.create_new_role')}} @endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">{{ trans('sentence.create_new_role')}}</h4>
    <x-alert.alert-component />
    <div class="card">
        <div class="card-body">
         <form 
            action="{{ route('role.store') }}" 
            method="post" 
            class="needs-validation" 
            role="form"
            novalidate
        >
        @csrf
        <div class="row">
            <div class="col mb-3">
            <label for="name" class="form-label">{{ trans('sentence.name')}}</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="{{ trans('sentence.name')}}" required>
            <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
            <label for="display_name" class="form-label">{{ trans('sentence.display_name')}}</label>
            <input type="text" name="display_name" id="display_name" class="form-control" placeholder="{{ trans('sentence.display_name')}}" required>
            <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
            <div class="col mb-0">
            <label for="dobBasic" class="form-label">{{ trans('sentence.description')}}</label>
            <input type="text" name="description" id="dobBasic" class="form-control" placeholder="{{ trans('sentence.description')}}" required>
            <div class="invalid-tooltip">{{ trans('sentence.required')}}</div>
            </div>
        </div>
            
        <hr>
            
        @php  $previous_permission = "";  @endphp

        <div class="">
            <input
                type="checkbox"
                id="selectAll"
                class="form-check-input"
            />
            <label class="checkboxSuccess1" for="selectAll" id="replace">Select All</label>
        </div>
            <div class="form-inline">
                @foreach ($permissions as $permission)
                    @if($previous_permission != $permission->description)
                        <div class="col mb-0" style="margin-top:10px;">
                            <input
                                type="checkbox"
                                class="form-check-input {{ lcfirst($permission->description) }}"
                                value="{{$permission->id}}"
                                onClick="selectPermission('{{ lcfirst($permission->description) }}')"
                            />
                            <label for="emailBasic" class="form-label">{{ ucfirst($permission->description) }}</label>
                        </div>
                    @endif
                        <div class="form-check form-switch mb-2 form-inline">
                            <input 
                                class="form-check-input" 
                                id="{{ lcfirst($permission->description) }}"
                                type="checkbox" 
                                id="{{$permission->id}}"
                                name="permissions[]"
                                value="{{$permission->id}}"
                                @php if(isset($role_permission[$permission->id]) && $role_permission[$permission->id]) { @endphp checked @php } 
                                @endphp
                            >
                            <label class="form-check-label" for="{{$permission->id}}">{{$permission->display_name}}</label>
                        </div>
                        @php
                            $previous_permission = $permission->description;
                            $check = isset( $permissions[$loop->index +1]->description) ? $permissions[$loop->index +1]->description : "-";
                        @endphp
                        @if($previous_permission != $check || $check == '-')@endif
                    @endforeach
                </div>
                <div class="fw-bold py-1 mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
    </div>
</div>
@endsection
