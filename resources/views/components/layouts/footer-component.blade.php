<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('datatable/js/datatables.responsive.js') }}"></script>
<script src="{{ asset('datatable/js/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('datatable/js/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('datatable/js/buttons.server-side.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.buttons.min.js') }}"></script>
<!-- End Datatable -->

<!-- Sweet Alert -->
<script src="{{ asset('admin/sweetalert/sweetalert.min.js') }}"></script>
<!-- End Sweet Alert -->

<!-- Toastr Alert -->
{!! Toastr::message() !!}

<script src="{{ asset('admin/js/custom.js') }}"></script>
@stack('script')