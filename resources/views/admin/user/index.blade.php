@extends('admin.layouts.master')

@section('title') {{ trans('sentence.user_list')}} @endsection

@section('content')

  <div class="row mt-3">
    <div class="col-md-3 mt-2">
      <h4 class="fw-bold">{{ trans('sentence.user_list')}}</h4>
    </div>
    <div class="col-md 7"></div>
    <div class="col-md-2">
      <a class="button-create float-right" data-bs-target="#basicModal" data-backdrop="static" data-keyboard="false" data-bs-toggle="modal" >{{ trans('sentence.create_new')}}</a>
    </div> 
  </div>

  <x-alert.alert-component />

  <div class="card mt-3">
    <div class="card-body">
      <table class="table data-table">
        <thead>
            <tr>
                <th>{{ trans('sentence.serial') }}</th>
                <th>{{ trans('sentence.name') }}</th>
                <th>{{ trans('sentence.email') }}</th>
                <th>{{ trans('sentence.status') }}</th>
                <th>{{ trans('sentence.created') }}</th>
                <th>{{ trans('sentence.action') }}</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
  </div>

  @includeIf('admin.user.modal._create')
  <div class="edit-modal">  </div>

@endsection
@push('script')
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        "processing": true,
        "retrieve": true,
        "serverSide": true,
        'paginate': true,
        'searchDelay': 700,
        "bDeferRender": true,
        "responsive": true,
        "autoWidth": false,
        ajax: "{{ route('user') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ],
    });
  });
</script>
@endpush