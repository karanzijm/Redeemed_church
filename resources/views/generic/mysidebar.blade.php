@extends('layouts.myfile')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Posts
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>User Management</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Admins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    {{-- <h1 class="h2">Dashboard</h1> --}}
                    {{-- @yield('content') --}}
                    <form action="{{ route('read') }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white">
                        @csrf
                          <input type="file" name="file" class="form-control">
                          <br>
            
                      <div class="row form-group">
                        <div class="col-md-12">
                          <label class="font-weight-bold" for="message">Message</label> 
                          <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Add Message to send"></textarea>
                          <p id="message_character"></p>
                        </div>
                      </div>
            
                      <div class="row form-group">
                        <div class="col-md-12">
                          <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                        </div>
                      </div>
            
            
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection