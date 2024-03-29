<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <!-- <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /> -->

    <!-- Styles -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    
    <!--  Owl Carousel  -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!--  Font awesome  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <style>
    a{
        text-decoration: none !important; 
    }
</style>

</head>
<body>
    @include ('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
        <div class="main-footer bg-dark">
                <div class="container">
                    <div class="row text-white justify-content-center">
                        <div class="m-5 col-lg-3 col-sm-6 ">
                            <h4>Social media</h4>
                            <ul class="list-unstyled">
                                <li><a href="https://www.facebook.com/Eme-Store-102343155244290" >Facebook</a></li>
                                <li><a href="https://www.instagram.com/janis.ropa/" >Instagram</a></li>
                                <li><a href="https://www.facebook.com/Eme-Store-102343155244290" >Twitter</a></li>
                                <li><a href="https://www.facebook.com/Eme-Store-102343155244290" >YouTube</a></li>
                            </ul>
                        </div>
                        <div class="m-5 col-lg-3 col-sm-6">
                            <h4>Contact</h4>
                            <ul className="list-unstyled">
                                <li>Phone number: 449-406-74-57</li>
                                <li>Email: emecommerce@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
    </div>

    
    
    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>

    @endif

    @yield('scripts')

    
</body>
</html>
