<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KebabFinder - @yield('title')</title>

    @vite(['resources/scss/app.scss'])
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    {{-- MAP --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <!-- loader -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    {{-- MAP --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('aos/aos.js')}}"></script>
    <script src="{{ asset('glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('php-email-form/validate.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js')}}"></script>
    @include('layouts.map')
    @yield('scripts')
</body>

</html>