<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <style>
        @keyframes count-up {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card h5 {
            animation: count-up 1.5s ease-out;
            /* Animation duration and easing */
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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



    {{-- Loader Styling --}}

    <link rel="stylesheet" href="{{ asset('admin/css/custom1.css') }}">



</head>

<body class="g-sidenav-show bg-gray-200">

    {{-- Loader  --}}
    <div class="loader">
        <img src="{{ asset('assets/loader.gif') }}" alt="Loading">
    </div>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/core/jquery.min.js')}}"  ></script> --}}
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
    @yield('scripts');


    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @yield('scripts')





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countUpElements = document.querySelectorAll('.card h5');

            countUpElements.forEach(element => {
                const originalValue = parseInt(element.textContent, 10);
                if (!isNaN(originalValue)) {
                    element.textContent = '0';

                    const increment = Math.ceil(originalValue /
                        30); // Divide by the number of frames (30 frames per second)
                    let currentValue = 0;

                    const interval = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= originalValue) {
                            element.textContent = originalValue;
                            clearInterval(interval);
                        } else {
                            element.textContent = currentValue;
                        }
                    }, 1000 / 30); // Update 30 times per second (30 frames per second)
                }
            });
        });
    </script>
</body>

</html>
