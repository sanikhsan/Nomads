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

    <link rel="stylesheet" href="{{asset('admin/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/app.css')}}">
    {{-- <link rel="shortcut icon" href="{{asset('admin/images/favicon.svg')}}" type="image/x-icon"> --}}
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('customer.layouts.navigation')

            <div class="content-wrapper container">
                
                @yield('customer-content')
                
            </div>

            
            
            @include('customer.layouts.footer')
        </div>
    </div>
    <script src="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    
    @stack('addons-script')

    <script src="{{asset('admin/js/mazer.js')}}"></script>
    <script src="{{asset('admin/js/pages/horizontal-layout.js')}}"></script>
</body>

</html>

