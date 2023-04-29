<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>@yield('title')</title>
<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>
<link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/icon/favicon.jpg') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/flag-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<!-- Datatable -->
<link rel="stylesheet" href="{{ asset('datatable/css/buttons.dataTables.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('datatable/css/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('datatable/css/responsive.bootstrap5.css') }}">
<!-- End Datatable -->

<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" />

<script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

@stack('style')