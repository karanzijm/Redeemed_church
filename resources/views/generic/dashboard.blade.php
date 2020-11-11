<!DOCTYPE html>
<html lang="en">
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
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
            <main>
                @include('generic.sidebar')
                @yield('content')
            </main>
            <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('js/js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/js/popper.min.js') }}"></script>
  

  <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/js/aos.js') }}"></script>
  <script src="{{ asset('js/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/js/scrollax.min.js') }}"></script>
  
  <script src="{{ asset('js/js/main.js') }}"></script>
  {{-- other  --}}
  <script src="{{ asset('js/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('js/js/bootstrap-datepicker.min.js') }}"></script>
        </body>
      </html>