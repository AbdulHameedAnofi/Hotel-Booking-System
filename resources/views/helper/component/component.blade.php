@extends('admin.layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('js/component/tagify.css') }}">
@endpush

@section('content')
    <x-alert.alert-component />

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span>Component
    </h4>

    <div class="card">
       <div class="card-body">
        <div class="col-xl-12">
          <h6 class="text-muted">Helper Component</h6>
          <div class="nav-align-left mb-4">
            <ul class="nav nav-pills me-3" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#select" aria-controls="select" aria-selected="true">Select2</button>
              </li>
              <hr>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tagify" aria-controls="tagify" aria-selected="true">Tagify</button>
              </li>
          </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="select" role="tabpanel">
                  @includeIf('helper.component.select.select')
              </div>
              <hr>
              <div class="tab-pane fade" id="tagify" role="tabpanel">
                @includeIf('helper.component.tagify.tagify')
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection

@push('script')
<script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/component/form-select.js') }}"></script>
<script src="{{ asset('js/component/tagify.js') }}"></script>
@endpush