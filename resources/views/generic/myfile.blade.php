<!DOCTYPE html>
<html lang="en">
    <head>
        @include('generic.header')
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <main>
          @include('generic.mysidebar')
          @yield('content')
        </main>
    
    </body>
    @include('generic.footer')
</html>