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
                <th>User</th>
                <th>Email</th>
                <th>Room No</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Amount</th>
                <th>Night</th>
                <th>Booking Date</th>
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
        ajax: "{{ route('booked.room') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'user.name'},
            {data: 'email', name: 'user.email'},
            {data: 'room', name: 'room.number'},
            {data: 'check_in', name: 'check_in'},
            {data: 'check_out', name: 'check_out'},
            {data: 'total_price', name: 'invoice.total_price'},
            {data: 'booking_night', name: 'booking_night'},
            {data: 'created_at', name: 'created_at'}
        ],
    });
  });
</script>
@endpush