<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Title Section --}}
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

    <link href="{{asset('admin/assets/css/materialdesignicons.min.css')}}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

    <!-- Data Tables -->
    <link href='{{asset('admin/assets/plugins/data-tables/datatables.bootstrap5.min.css')}}' rel='stylesheet'>
    <link href='{{asset('admin/assets/plugins/data-tables/responsive.datatables.min.css')}}' rel='stylesheet'>


    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{asset('admin/assets/css/ekka.css')}}" rel="stylesheet" />
    <style>

    </style>


    <!-- FAVICON -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" />

    @yield('styles')
</head>

    <body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    @include('admin.pages.sidebar')
    @yield('sidebar')


  <link href="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">


    <!-- Common Javascript -->
    <script src="{{asset('admin/assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/slick/slick.min.js')}}"></script>

    <!-- Chart -->
    <script src="{{asset('admin/assets/plugins/charts/Chart.min.js')}}"></script>
    <!-- <script src="{{asset('admin/assets/js/chart.js')}}"></script> -->

    <!-- Google map chart -->
    <script src="{{asset('admin/assets/plugins/charts/google-map-loader.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/charts/google-map.js')}}"></script>

    <!-- Date Range Picker -->
    <script src="{{asset('admin/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/date-range.js')}}"></script>

    <!-- Option Switcher -->
    <script src="{{asset('admin/assets/plugins/options-sidebar/optionswitcher.js')}}"></script>

    <!-- Ekka Custom -->
    <script src="{{asset('admin/assets/js/ekka.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datatables -->
    <script src='{{asset('admin/assets/plugins/data-tables/jquery.datatables.min.js')}}'></script>
    <script src='{{asset('admin/assets/plugins/data-tables/datatables.bootstrap5.min.js')}}'></script>
    <script src='{{asset('admin/assets/plugins/data-tables/datatables.responsive.min.js')}}'></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awsome iCon Kit Script -->
    <script src="https://kit.fontawesome.com/5488d9796f.js" crossorigin="anonymous"></script>


    {{-- vendors --}}
{{--    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('scripts')

    </body>
</html>

