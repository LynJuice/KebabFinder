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
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="aos/aos.css" rel="stylesheet">
    <link href="glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="css/main.css" rel="stylesheet">
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

    <!-- Vendor JS Files -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="aos/aos.js"></script>
    <script src="glightbox/js/glightbox.min.js"></script>
    <script src="purecounter/purecounter_vanilla.js"></script>
    <script src="swiper/swiper-bundle.min.js"></script>
    <script src="php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
    @yield('scripts')
</body>

</html>