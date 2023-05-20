<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Nomads') }}</title>
    <link
      rel="stylesheet"
      href="{{asset('landing/libraries/bootstrap/css/bootstrap.css')}}"
    />
    <link rel="stylesheet" href="{{asset('landing/styles/main.css')}}" />
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('landing/libraries/xzoom/dist/xzoom.css')}}" />
    <link rel="stylesheet" href="{{asset('landing/libraries/gijgo/css/gijgo.min.css')}}" />
  </head>
  <body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    
    @if (!request()->routeIs('landing'))
        @include('landing.layouts.navbar-checkout')
    @else
        @include('landing.layouts.navigation')
        @include('landing.layouts.header')
    @endif

    <main>
        @yield('landing-section')
    </main>
    
    @if (!request()->routeIs('success'))
        @include('landing.layouts.footer')
    @endif

    <script src="{{asset('landing/libraries/retina/retina.js')}}"></script>
    <script src="{{asset('landing/libraries/jquery/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('landing/libraries/bootstrap/js/bootstrap.js')}}"></script>
    @if (!request()->routeIs('landing'))
        <script src="{{asset('landing/libraries/xzoom/dist/xzoom.min.js')}}"></script>
        <script src="{{asset('landing/libraries/gijgo/js/gijgo.min.js')}}"></script>
        <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
            });

            $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{asset('landing/images/ic_doe.png')}}" alt="" />'
            }
            });
        });
        </script>
    @endif
  </body>
</html>
