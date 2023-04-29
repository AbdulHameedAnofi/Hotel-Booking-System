@extends('admin.layouts.master')

@section('title') {{ trans('sentence.activity_log')}} @endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    {{ trans('sentence.activity_log')}}
</h4>

<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table data-table">
            <thead>
                <tr>
                    <th>{{ trans('sentence.serial')}}</th>
                    <th>{{ trans('sentence.user')}}</th>
                    <th>{{ trans('sentence.event')}}</th>
                    <th>{{ trans('sentence.ip_address')}}</th>
                    <th>{{ trans('sentence.old_value')}}</th>
                    <th>{{ trans('sentence.new_value')}}</th>
                    <th>{{ trans('sentence.time')}}</th>
                    <th>{{ trans('sentence.type')}}</th>
                    <th>{{ trans('sentence.url')}}</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0"></tbody>
            </table>
        </div>
    </div>
</div>
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
        ajax: "{{ route('log') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'user', name: 'user.name'},
            {data: 'event', name: 'event'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'old_values', name: 'old_values'},
            {data: 'new_values', name: 'new_values'},
            {data: 'created_at', name: 'created_at'},
            {data: 'auditable_type', name: 'auditable_type'},
            {data: 'url', name: 'url'}
        ],
    });
  });
</script>
@endpush