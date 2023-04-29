@extends('admin.layouts.master')

@section('title') Room List @endsection

@section('content')

  <div class="row mt-3">
    <div class="col-md-3 mt-2">
      <h4 class="fw-bold">Room</h4>
    </div>
    <div class="col-md 7"></div>
    <div class="col-md-2">
      <a class="button-create float-right" data-bs-target="#basicModal" data-backdrop="static" data-keyboard="false" data-bs-toggle="modal" >Create New</a>
    </div> 
  </div>

  <x-alert.alert-component />

  <div class="card mt-3">
    <div class="card-body">
      <table class="table data-table">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Facilities</th>
                <th>Status</th>
                <th>Type</th>
                <th>Created</th>
                <th>Create Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
  </div>

  @include('admin.system.room.modal._create')
  <div class="edit-modal"></div>

@endsection
@push('script')
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [ [0, 'desc'] ],
        ajax: "{{ route('room.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'number', name: 'number'},
            {data: 'facility', name: 'facilities.name'},
            {data: 'status', name: 'status'},
            {data: 'type', name: 'type.name'},
            {data: 'created_by', name: 'created_by.name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ],
    });
  });
</script>
@endpush