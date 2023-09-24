<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Styles -->

    {{-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




</head>
<body class="g-sidenav-show bg-gray-200">
    <!-- Sidebar -->
    @include('layouts.inc.sidebar')

    <!-- Main Content -->
    <div class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.inc.adminnav')
        <div class="container-fluid py-4">
            @yield('content')
        </div>
        <div class="container-fluid py-4">
            @include('layouts.inc.adminfooter')
        </div>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('admin/js/core/popper.min.js')}}"  ></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js')}}"  ></script>
    {{-- <script src="{{ asset('admin/js/core/jquery.min.js')}}"  ></script> --}}
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js')}}"  ></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js')}}"  ></script>
    @yield('scripts');
</body>
</html>
