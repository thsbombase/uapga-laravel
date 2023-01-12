<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UAPGA - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">

    @php
    $main_color = \App\Models\SystemColor::first();
    //if main color is not set, set default color
    if(!$main_color){
    $main_color = new \App\Models\SystemColor();
    $main_color->color = '#0d6efd';
    $main_color->save();
    }
    echo '<style>
        :root {
            scroll-behavior: smooth;
            --main-color: '. $main_color->color .';
        }
    </style>'
    @endphp
    <!-- =======================================================
  * Template Name: UAPGA - v4.9.1
  * Template URL: https://bootstrapmade.com/UAPGA-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.html">UAPGA</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class=" @if (Route::currentRouteName() == 'landing') active @endif "
                            href="{{ route('landing') }}">Home</a></li>
                    <li><a class=" @if (Route::currentRouteName() == 'about_us') active @endif "
                            href="{{ route('about_us') }}">About Us</a></li>
                    {{-- <li><a class=" @if (Route::currentRouteName() == 'partners') active @endif "
                            href="{{ route('partners') }}">Partners</a></li> --}}
                    <li class="dropdown"><a href="#" class="pe-none"><span>Our Partners</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('partners') }}">Partners</a></li>
                            <li><a href="{{ route('sponsors') }}">Sponsors</a></li>
                        </ul>
                    </li>
                    <li><a class=" @if (Route::currentRouteName() == 'contact_us') active @endif "
                            href="{{ route('contact_us') }}">Contact Us</a></li>
                    <li><a class=" @if (Route::currentRouteName() == 'login') active @endif "
                            href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <main id="main">
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3>About UAPGA</h3>
                    <p>The United Architects of the Philippines Graduate Auxiliary is the duly recognized graduate arm
                        of the United Architects of the Philippines (UAP). The organization looks forward to being a
                        more effective institute in learning today's Architecture Graduates in achieving their dream to
                        become empowered and equipped Architects of the Philippines.</p>
                    <p class="social">
                        <a href="https://twitter.com/uapganational?fbclid=IwAR2xnzBB9c6sQLq3XWYj4v_iNpRWzvt9f4OGcW_t6ANAkgmIUf9Rc5VDnTo"
                            target="_blank"><span class="bi bi-twitter"></span></a>
                        <a href="https://www.facebook.com/theuapganational" target="_blank"><span
                                class="bi bi-facebook"></span></a>
                        <a href="https://www.instagram.com/uapganational/?fbclid=IwAR2B8S-9Ah31AncMxFOVE_Dtk7-UMOfKPIs8p5d4PAjSnpErTHzwLq3EQIw"
                            target="_blank"><span class="bi bi-instagram"></span></a>
                    </p>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-7">
                    <p class="copyright">&copy; Copyright UAPGA. All Rights Reserved</p>
                </div>
            </div>

        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>