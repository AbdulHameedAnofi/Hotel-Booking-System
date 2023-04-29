@extends('admin.layouts.master')
@push('style')
<link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endpush
@section('title') Media Manager @endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    Media Manager
</h4>
    <div id="fm-main-block">
        <div id="fm" style="height: 600px;"></div>
    </div>
@endsection

@push('script')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

        fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
            window.opener.fmSetLink(fileUrl);
            window.close();
        });
        var node = document.querySelector('[title="About"]');
        node.style.display = 'none';
    });
</script>
@endpush