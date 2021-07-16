<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }} @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/web/img/favicon.png" rel="icon">
  <link href="assets/web/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/web/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/web/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/web/css/style.css" rel="stylesheet">

	@yield('styles')
  @livewireStyles
  <!-- =======================================================
  * Template Name: eStartup - v4.3.0
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="{{ route('home') }}"><img src="assets/web/img/logo.png" alt="img"></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about-us">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
  <!--         <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
           <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
           <li><a class="nav-link scrollto order-btn" href="">Order</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @include('includes.flash-message')
  @yield('content')

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#"><img src="assets/web/img/logo-white.png" alt="img"></a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="list-menu">

            <h4>About Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="list-menu">

            <h4>About Us</h4>

            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Features item</a></li>
              <li><a href="#">Live streaming</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>

          </div>
        </div>




      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights Amaze. All rights reserved.</p>
      </div>
    </div>

  </footer><!-- End  Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="assets/web/vendor/aos/aos.js"></script>
  <script src="assets/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/web/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/web/vendor/php-email-form/validate.js"></script>
  <script src="assets/web/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/web/js/main.js"></script>

	@include('includes.flash-message')
	@yield('scripts')
  @livewireScripts
</body>

</html>