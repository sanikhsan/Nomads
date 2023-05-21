<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Nomads') }}</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}">
    
    @stack('addons-style')

    <link rel="stylesheet" href="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/app.css')}}">
    {{-- <link rel="shortcut icon" href="{{asset('admin/images/favicon.svg')}}" type="image/x-icon"> --}}
</head>

<body>
    <div id="app">
        
        @include('admin.layouts.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('admin-content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Nomads</p>
                    </div>
                    <div class="float-end">
                        <p> Admin Dashboard <span class="text-danger">-</i></span><a
                                href="{{url('/')}}"> Nomads</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    
    @stack('addons-script')

    <script src="{{asset('admin/js/mazer.js')}}"></script>
</body>

</html>
