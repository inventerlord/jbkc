<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jbiz Solutions</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description"
        content="Jbiz Solutions is the fastest growing organization in the areas of Consulting, IT training, Virtual employees resourcing, data & analytics services over cloud. Avail services for your business.">
    <link rel="canonical" href="https://jbizsolutions.com/">
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{--    <link rel="icon" type="image/png" sizes="64x64" href="{{asset('public/fav.ico')}}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/frontend/upltz/css/lobibox.min.css') }}">
    <link href="{{ asset('assets/frontend/upltz/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/upltz/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/upltz/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/frontend/upltz/css/checkbox.css') }}" rel="stylesheet">
    <!-- Testimonials Effect -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/upltz/css/index.css ') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/upltz/images/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/common/font-awesome/css/font-awesome.min.css') }}">
    <link href="{{ asset('assets/backend/inspinia/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">


    <style>
        .nv-right>.nav-item {
            /* margin-right: 1.9rem !important; */
        }

        .navbar .hc {
            padding: 3px 5px;
            border-radius: 20px
        }

        .navbar .hc:hover {
            background-color: #efefef;
        }

        .dropdown:hover>.dropdown-menu {
            display: block !important;
        }

        .navbar-nav .dropdown-menu {

            margin-top: -5px;
        }

        body {
            font: normal 16px / 26px "Poppins", Helvetica, Arial, Verdana, sans-serif
        }

        .nav-link {
            white-space: nowrap;
        }
    </style>
    @yield('pg-styles')
</head>

<body>



    <!-- Start Header -->


    <div class="text-center">
        <a class="" href="https://jbizsolutions.com/"><img style="width: 320px"
                src="{{ asset('assets/frontend/upltz/images/logo.png') }}" alt=""></a>

    </div>
    <nav class="navbar navbar-expand-xl navbar-light bg-light"
        style="background-color: #ffffff!important;padding-right: 2rem;padding-left: 2rem">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nv-right navbar-nav mr-auto" style="">
                <li class="nav-item hc active">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item hc dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="consultancy" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consultancy
                    </a>
                    <div class="dropdown-menu" aria-labelledby="consultancy">
                        <a class="dropdown-item" href="{{ route('business.consultancy') }}">Business Consultancy</a>
                        <a class="dropdown-item" href="#">IT Consultancy</a>
                    </div>
                </li>
                <li class="nav-item hc dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Corporate Training
                    </a>
                    <div class="dropdown-menu" aria-labelledby="corporate">
                        <a class="dropdown-item" href="#">Business Training</a>
                        <a class="dropdown-item" href="#">IT Training</a>
                    </div>
                </li>
                <li class="nav-item hc dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Professional Training
                    </a>
                    <div class="dropdown-menu" aria-labelledby="corporate">
                        <a class="dropdown-item" href="#">Business Training</a>
                        <a class="dropdown-item" href="#">IT Training</a>
                    </div>
                </li>
                <li class="nav-item hc dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="corporate" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Academic
                    </a>
                    <div class="dropdown-menu" aria-labelledby="corporate">
                        <a class="dropdown-item" href="#">Business School</a>
                        <a class="dropdown-item" href="#">IT School</a>
                    </div>
                </li>
                <li class="nav-item hc">
                    <a class="nav-link" href="#">
                        E-Solutions
                    </a>

                </li>
                <li class="nav-item hc">
                    <a class="nav-link" href="#">
                        Events
                    </a>

                </li>

            </ul>
            <ul class="navbar-nav ml-auto" style="align-items: center;gap:5px">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item hc" style="padding-right: 10px;padding-left: 10px">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item hc" style="padding-right: 10px;padding-left: 10px">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item hc dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username ?? 'John doe' }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @can('dashboard')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            @endcan
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        style="background-color: #b5363a;padding: 5px 15px;border-radius: 20px;color: white;">
                        Contact US
                    </a>

                </li>
            </ul>
        </div>
    </nav>


    @yield('breadcrumb')
    @yield('pg-content')
    @yield('footer')




    <div id="mydiv" style="display: none">
        <div class="ajax-loader">Please wait..</div>
    </div>
    <!-- JS Part -->
    {{-- <script src="{{asset('assets/frontend/upltz/js/jquery-2.1.1.min.js')}}"></script> --}}
    <script src="{{ asset('assets/frontend/upltz/js/jquery-3.3.1.min.js') }}"></script>
    <!--<script src="assets/js/jquery-3.3.1.min.js"></script> -->
    <script src="{{ asset('assets/frontend/upltz/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/upltz/js/viewportchecker.js') }}"></script>

    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
-->

    <script src="{{ asset('assets/frontend/upltz/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/frontend/upltz/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/frontend/upltz/js/lobibox.js') }}"></script>
    <script src="{{ asset('assets/frontend/upltz/js/index.js') }}"></script>
    <script src="{{ asset('assets/frontend/upltz/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        // jQuery('document').ready(function(){
        // 		jQuery('.services').click(function(){
        // 			jQuery(".products").hide();
        // 			jQuery('.services_box').toggle();
        // 		});
        // });
    </script>
    @yield('pg-scripts')
    <script src="{{ asset('assets/backend/inspinia/js/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "17000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if (session()->has('alert_type'))
            toastr['{{ session()->get('alert_type') }}']('{!! session()->get('message') !!}', '{{ session()->get('title') }}')
        @endif
        // toastr['success']('hello', 'world')
    </script>
</body>

</html>
