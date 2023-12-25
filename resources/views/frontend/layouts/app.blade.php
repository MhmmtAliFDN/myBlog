<!DOCTYPE html>
<html lang="tr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Muhammet Ali Fidan - Blog Sitesi">
    <meta name="author" content="www.muhammetalifidan.com.tr">

    @stack('title')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/icon/coderlog2.ico') }}" type="image/x-icon" />
    <link rel="coderlog-icon" href="{{ asset('assets/backend/img/logo/coderlog.jpg') }}">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="{{ asset('assets/frontend/css/fonts.googleapis.com.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-shop.css') }}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/blog.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ asset('assets/frontend/css/blog-skin.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}" type="text/css">

    @stack('customCss')

    <!-- Head Libs -->
    <script src="{{ asset('assets/frontend/js/modernizr.min.js') }}"></script>

</head>

<body>

    <div class="body">

        @include('frontend.inc.navigation')

        <div role="main" class="main">
            @yield('content')
        </div>

        @include('frontend.inc.footer')
    </div>

    @stack('customJs')

    <!-- Vendor -->
    <script src="{{ asset('assets/frontend/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/particles.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

    <!-- Demo -->
    <script src="{{ asset('assets/frontend/js/blog.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/frontend/js/theme.init.js') }}"></script>

</body>

</html>
