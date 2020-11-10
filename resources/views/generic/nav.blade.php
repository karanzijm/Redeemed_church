<!DOCTYPE html>
<html lang="en">
        <head>
            @include('generic.header')
        </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
                <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}"><span class="flaticon-bible"></span>Redeemed Church</a>
                        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="oi oi-menu"></span> Menu
                        </button>

                        <div class="collapse navbar-collapse" id="ftco-nav">
                            <ul class="navbar-nav nav ml-auto">
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span>Home</span></a></li>
                                @guest
                                {{-- <li class="nav-item"><a href="{{ route('sendMessage') }}" class="nav-link"><span>Send Message</span></a></li> --}}
                                {{-- <li class="nav-item"><a href="#events-section" class="nav-link"><span>Events</span></a></li>
                                <li class="nav-item"><a href="#causes-section" class="nav-link"><span>Causes</span></a></li>
                                <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li> --}}
                                {{-- <li class="nav-item"><a href="#pastor-section" class="nav-link"><span>Pastor</span></a></li> --}}
                                {{-- <li class="nav-item"><a href="{{ route('contact')}}" class="nav-link"><span>Contact</span></a></li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @else
                                <li class="nav-item"><a href="{{ route('sendMessage') }}" class="nav-link"><span>Send Message</span></a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>


                                @endguest
                            </ul>
                        </div>
                </div>
            </nav>
            <main>
                {{-- @include('generic.sidebar') --}}
                @yield('content')
            </main>

            <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

</body>
 @include('generic.footer')

      </html>
