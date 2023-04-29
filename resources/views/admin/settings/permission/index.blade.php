@extends('admin.layouts.master')

@section('title') {{ trans('sentence.permission')}} @endsection

@section('content')

<div class="row mt-3">
  <div class="col-md-3 mt-2">
    <h4 class="fw-bold">{{ trans('sentence.permission')}}</h4>
  </div>
  <div class="col-md 7"></div>
  <div class="col-md-2">
    <a class="button-create float-right" data-bs-target="#basicModal" data-backdrop="static" data-keyboard="false" data-bs-toggle="modal" >{{ trans('sentence.create_new')}}</a>
  </div> 
</div>

<x-alert.alert-component />

  <div class="card">
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table data-table">
          <thead>
            <tr>
              <th>{{ trans('sentence.serial')}}</th>
              <th>{{ trans('sentence.name')}}</th>
              <th>{{ trans('sentence.display_name')}}</th>
              <th>{{ trans('sentence.description')}}</th>
              <th>{{ trans('sentence.action')}}</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('admin.settings.permission.modal._create')
  <div class="edit-modal"></div>
    
@endsection

@push('script')
<script>
    $(function () {
    var table = $('.data-table').DataTable({
        "processing": true,
        "retrieve": true,
        "serverSide": true,
        'paginate': true,
        'searchDelay': 700,
        "bDeferRender": true,
        "responsive": true,
        "autoWidth": true,
        ajax: "{{ route('permission') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'display_name', name: 'display_name'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });
  });
</script>
@endpush