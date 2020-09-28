<head>
    <title>Redeemed Church</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="{{ asset('css/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    {{-- other --}}
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap-datepicker.css') }}">
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}

</head>
<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                {{ __("Creative Tim") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples">
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Laravel example') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="{{ route('sendMessage') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Send Message") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Typography") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Maps") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
