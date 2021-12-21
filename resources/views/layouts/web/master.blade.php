<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="@yield('keywords','')">
    <meta name="description" content="@yield('description','')">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Kiuki Transportation Ltd &#8211; @yield('title','The Impossible just takes a little longer.')</title>



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/web/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--Font Awesome-->
    <link href="{{ asset('assets/web/css/fontawesome/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/regular.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/svg-with-js.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/fontawesome/v4-shims.min.css') }}" rel="stylesheet">

    <!--Slick CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/slick.css') }}">
    <!-- Animation CSS -->
    <link href="{{ asset('assets/web/css/aos.css') }}" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <!-- Product Image Zoom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/easyzoom.css') }}" />

    <!-- Datepicker CSS -->
    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/datepicker-custom.css') }}" type="text/css" />

    <!-- Select CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!---Mobile Menu-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/jquery.mmenu.positioning.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/jquery.mmenu.css') }}">

    <!-- Style CSS -->
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- Weather Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css"
        integrity="sha512-r/Gan7PMSRovDus++vDS2Ayutc/cSdl268u047n4z+k7GYuR7Hiw71FsT3QQxdKJBVHYttOJ6IGLnlM9IoMToQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
    @livewireStyles
</head>

@if(request()->is('transfers/airport-transfers*'))
<body class="bg-fixed banner-airport" data-aos-easing="ease-out-back" data-aos-duration="2000" data-aos-delay="0" style="padding-top: 0px;">
@else
<body>
@endif
    <div>
        <header id="header">
            <!-- Top Header -->
            <div class="top-header">
                <div class="row row-flex justify-content-center align-items-center text-center">
                    <div class="col-md-4">
                        <ul class="inline-items">
                            <li class="icon-list-item">
                                <span class="icon-list-icon"><i aria-hidden="true" class="far fa-clock"></i></span>
                                <span class="icon-list-text">{{ get_component('timings') }}</span></li>
                            <li class="icon-list-item"><a
                                    href="{{ get_component('map_link') }}">
                                    <span class="icon-list-icon"><i aria-hidden="true"
                                            class="fas fa-map-marked-alt"></i></span>
                                    <span class="icon-list-text">Visit Us</span>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="weather-block">
                            <a href="https://darksky.net/forecast/18.2787,-78.3465/us12/en" target="_blank"
                                rel="nofollow noopener"><span class="weather-day weather-current"><span
                                        class="weather_date">{{ date('l') }}</span> <i class="wi wi-night-cloudy"></i> <em
                                        class="weather-temp">{{ get_latest_temp() }} °C</em></span></a>
                        </div>
                    </div>
                    <div class="col-md-4 align-items-center">
                        <div class="tel-icons-wrapper">
                            <a href="tel:{{ get_component('phone_primary') }}">
                                <i aria-hidden="true" class="fas fa-phone-alt"></i>
                                <span class="icon-list-text">Call Us</span>
                            </a>
                        </div>
                        <div class="social-icons-wrapper">
                            <a href="https://kiukitours.com/contact-us/" target="_blank" rel="noopener">
                                <i class="fas fa-envelope"></i></a>
                            <a href="{{ get_component('social_facebook') }}" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i></a>
                            <a href="{{ get_component('social_insta') }}" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i></a>
                            <a href="{{ get_component('social_twitter') }}" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i></a>
                            <a href="{{ get_component('social_linkedin') }}" target="_blank" rel="noopener">
                                <i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nav Bar -->
            <nav id="navbar_top" class="navbar-expand-sm navbar-block">
                <div class="navbar-container">
                    <div class="row justify-content-right">
                        <div class="col-md-4">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ get_component('main_logo') }}"
                                        alt="Kiuki Transportation Jamaica"
                                        title="Kiuki Transportation Jamaica" itemprop="logo" /></a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="collapse navbar-collapse align-items-end justify-content-end"
                                id="navbarCollapse">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('tours') }}">Tours</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('transfers') }}">Transfers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('promotions') }}">Promotions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a>
                                    </li>
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>    
                                    @endguest
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.profile') }}">My Account</a>
                                        </li>    
                                    @endauth
                                    
                                    {{-- <li class="nav-item">
                                        <a href="#" title="Shopping Cart">
                                            <img src="{{ asset('assets/web/images/cart.png') }}" alt="cart" /><span
                                                class="menu-item-count"><i class="fas fa-caret-left"></i>0</span>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="search-link" href="#" title="search">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <div class="search-divblock">
                                            <form role="search" method="get" id="searchform1" class="searchform"
                                                action="https://kiukitours.com/">
                                                <input type="search" class="searchform-input" name="s" value=""
                                                    placeholder="Search …" title="Press enter to search">
                                                <div class="buttonsearch"><i class="fas fa-times"></i></div>
                                            </form>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Nav Header -->
            <div id="mobile-nav-header" class="mobile-nav-header" style="display:none;">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mobile-nav-row">
                        <div class="mobile-one-half">
                            <div class="mobile-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/web/images/kiuki-tours-logo-ws.svg') }}"
                                        alt="Kiuki Tours &amp; Transportation Jamaica"
                                        title="Kiuki Tours &amp; Transportation Jamaica" itemprop="logo" /></a>
                            </div>
                        </div>
                        <div class="mobile-one-half">
                            <ul class="d-flex justify-content-end align-items-center mobile-navul">
                                {{-- <li>
                                    <a href="#" title="Shopping Cart">
                                        <img src="images/cart-icon.png" alt="cart" /><span class="menu-item-count"><i
                                                class="fas fa-caret-left"></i>0</span>
                                    </a>
                                </li> --}}
                                <li>
                                    <a class="search-link" href="#" title="search">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <div class="search-divblock">
                                        <form role="search" method="get" id="searchform" class="searchform"
                                            action="{{ route('home') }}">
                                            <input type="search" class="searchform-input" name="s" value=""
                                                placeholder="Search …" title="Press enter to search">
                                            <div class="buttonsearch"><i class="fas fa-times"></i></div>
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <a href="#responsive_menu" class="mobile-main navbar-toggle mobile-menu-toggle"><i
                                            class="fas fa-align-justify"></i></a>
                                    <div class="mdesplay" style="display: none;">
                                        <div class="mobilemain-nav" id="responsive_menu">
                                            <ul>
                                                <li class="Selected"><a href="{{ route('tours') }}">Tours</a></li>
                                                <li><a href="{{ route('transfers') }}">Transfers</a></li>
                                                <li><a href="{{ route('promotions') }}">Promotions</a></li>
                                                <li><a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a></li>
                                                @guest
                                                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>    
                                                @endguest
                                                @auth
                                                    <li><a class="nav-link" href="{{ route('user.profile') }}">My Account</a></li>    
                                                @endauth
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </header>

            <!-- #Main Content-->
            </header>
        @yield('content')
        
    <!-- Section Four -->
    <div class="section-four">
        <div class="bg-shape-bottom" data-negative="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 27.8"
                preserveAspectRatio="none" style="">
            <path class="elementor-shape-fill"
                d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7	s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7	c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z M260.8,11.3	c-0.7-1-2-0.4-4.3-0.4c-2.3,0-6.1-1.2-5.8-1.1c0.3,0.1,3.1,1.5,6,1.9C259.7,12.2,261.4,12.3,260.8,11.3z M242.4,8.6	c0,0-2.4-0.2-5.6-0.9c-3.2-0.8-10.3-2.8-15.1-3.5c-8.2-1.1-15.8,0-15.1,0.1c0.8,0.1,9.6-0.6,17.6,1.1c3.3,0.7,9.3,2.2,12.4,2.7	C239.9,8.7,242.4,8.6,242.4,8.6z M185.2,8.5c1.7-0.7-13.3,4.7-18.5,6.1c-2.1,0.6-6.2,1.6-10,2c-3.9,0.4-8.9,0.4-8.8,0.5	c0,0.2,5.8,0.8,11.2,0c5.4-0.8,5.2-1.1,7.6-1.6C170.5,14.7,183.5,9.2,185.2,8.5z M199.1,6.9c0.2,0-0.8-0.4-4.8,1.1	c-4,1.5-6.7,3.5-6.9,3.7c-0.2,0.1,3.5-1.8,6.6-3C197,7.5,199,6.9,199.1,6.9z M283,6c-0.1,0.1-1.9,1.1-4.8,2.5s-6.9,2.8-6.7,2.7	c0.2,0,3.5-0.6,7.4-2.5C282.8,6.8,283.1,5.9,283,6z M31.3,11.6c0.1-0.2-1.9-0.2-4.5-1.2s-5.4-1.6-7.8-2C15,7.6,7.3,8.5,7.7,8.6	C8,8.7,15.9,8.3,20.2,9.3c2.2,0.5,2.4,0.5,5.7,1.6S31.2,11.9,31.3,11.6z M73,9.2c0.4-0.1,3.5-1.6,8.4-2.6c4.9-1.1,8.9-0.5,8.9-0.8	c0-0.3-1-0.9-6.2-0.3S72.6,9.3,73,9.2z M71.6,6.7C71.8,6.8,75,5.4,77.3,5c2.3-0.3,1.9-0.5,1.9-0.6c0-0.1-1.1-0.2-2.7,0.2	C74.8,5.1,71.4,6.6,71.6,6.7z M93.6,4.4c0.1,0.2,3.5,0.8,5.6,1.8c2.1,1,1.8,0.6,1.9,0.5c0.1-0.1-0.8-0.8-2.4-1.3	C97.1,4.8,93.5,4.2,93.6,4.4z M65.4,11.1c-0.1,0.3,0.3,0.5,1.9-0.2s2.6-1.3,2.2-1.2s-0.9,0.4-2.5,0.8C65.3,10.9,65.5,10.8,65.4,11.1	z M34.5,12.4c-0.2,0,2.1,0.8,3.3,0.9c1.2,0.1,2,0.1,2-0.2c0-0.3-0.1-0.5-1.6-0.4C36.6,12.8,34.7,12.4,34.5,12.4z M152.2,21.1	c-0.1,0.1-2.4-0.3-7.5-0.3c-5,0-13.6-2.4-17.2-3.5c-3.6-1.1,10,3.9,16.5,4.1C150.5,21.6,152.3,21,152.2,21.1z">
            </path>
            <path class="elementor-shape-fill"
                d="M269.6,18c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3	C267.7,18.8,269.7,18,269.6,18z">
            </path>
            <path class="elementor-shape-fill"
                d="M227.4,9.8c-0.2-0.1-4.5-1-9.5-1.2c-5-0.2-12.7,0.6-12.3,0.5c0.3-0.1,5.9-1.8,13.3-1.2	S227.6,9.9,227.4,9.8z">
            </path>
            <path class="elementor-shape-fill"
                d="M204.5,13.4c-0.1-0.1,2-1,3.2-1.1c1.2-0.1,2,0,2,0.3c0,0.3-0.1,0.5-1.6,0.4	C206.4,12.9,204.6,13.5,204.5,13.4z">
            </path>
            <path class="elementor-shape-fill"
                d="M201,10.6c0-0.1-4.4,1.2-6.3,2.2c-1.9,0.9-6.2,3.1-6.1,3.1c0.1,0.1,4.2-1.6,6.3-2.6	S201,10.7,201,10.6z">
            </path>
            <path class="elementor-shape-fill"
                d="M154.5,26.7c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3	C152.6,27.5,154.6,26.8,154.5,26.7z">
            </path>
            <path class="elementor-shape-fill"
                d="M41.9,19.3c0,0,1.2-0.3,2.9-0.1c1.7,0.2,5.8,0.9,8.2,0.7c4.2-0.4,7.4-2.7,7-2.6	c-0.4,0-4.3,2.2-8.6,1.9c-1.8-0.1-5.1-0.5-6.7-0.4S41.9,19.3,41.9,19.3z">
            </path>
            <path class="elementor-shape-fill"
                d="M75.5,12.6c0.2,0.1,2-0.8,4.3-1.1c2.3-0.2,2.1-0.3,2.1-0.5c0-0.1-1.8-0.4-3.4,0	C76.9,11.5,75.3,12.5,75.5,12.6z">
            </path>
            <path class="elementor-shape-fill"
                d="M15.6,13.2c0-0.1,4.3,0,6.7,0.5c2.4,0.5,5,1.9,5,2c0,0.1-2.7-0.8-5.1-1.4	C19.9,13.7,15.7,13.3,15.6,13.2z">
            </path>
        </svg></div>
        <div class="section-four-inner">
            <div class="row justify-content-center no-margin services-row">
                <div class="col-md-4">
                    <div class="icon-box">
                        <i aria-hidden="true" class="fas fa-star"></i>
                    </div>
                    <h4>50+ Destinations</h4>
                    <p class="no-margin">We offer tour & transfer services for destinations across Jamaica.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i aria-hidden="true" class="fas fa-star"></i>
                    </div>
                    <h4>Fast Booking</h4>
                    <p class="no-margin">We guarantee the best prices with memorable destinations and friendly staff!</p>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <i aria-hidden="true" class="fas fa-star"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p class="no-margin">Kiuki Tours is open everyday to help our customers! Don't hesitate to contact us.
                    </p>
                </div>
            </div>
        </div>
    </div>

        <!-- Footer -->
        {{-- {!! get_component('main_footer') !!} --}}
        
        <footer id="footer">
            <div class="footer-shape-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" opacity="0.33"
                        d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">
                    </path>
                    <path class="elementor-shape-fill" opacity="0.66"
                        d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z">
                    </path>
                    <path class="elementor-shape-fill"
                        d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z">
                    </path>
                </svg></div>
            <div class="footer-inner">
                <div class="container">
                    <div class="d-flex flex-wrap footer-row">
                        <div class="div-one">
                            <div class="footerlogo text-center">
                                <!--?xml version="1.0" encoding="UTF-8" standalone="no"?--> 
                                {!! get_component('footerlogo') !!}
                                {{-- <svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:serif="http://www.serif.com/" width="100%" height="100%"
                                    viewBox="0 0 5959 1230" xml:space="preserve"
                                    style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:bevel;stroke-miterlimit:1.41421;">
                                    <g transform="matrix(1,0,0,1,62.5,62.5)">
                                        <path
                                            d="M102.149,212.292L69.608,199.275L69.608,1080L102.149,1093.01L102.149,212.292ZM264.866,160.221L199.778,199.275L199.778,1053.96L264.866,1014.91L264.866,160.221ZM5828.81,519.625L5753.69,594.753C5718.43,563.099 5685.77,547.272 5655.72,547.272C5635.28,547.272 5618.36,552.981 5604.93,564.401C5591.51,575.82 5584.8,589.944 5584.8,606.773C5584.8,623.201 5590.41,637.024 5601.63,648.244C5612.85,659.863 5636.29,675.49 5671.95,695.123C5722.83,723.572 5756.89,749.616 5774.12,773.256C5792.55,796.496 5801.77,826.747 5801.77,864.011C5801.77,917.702 5783.14,960.776 5745.87,993.231C5707.81,1025.29 5658.32,1041.31 5597.42,1041.31C5514.48,1041.31 5445.76,1003.85 5391.27,928.921L5478.42,868.218C5514.08,911.091 5552.14,932.527 5592.61,932.527C5615.45,932.527 5633.78,926.517 5647.61,914.497C5661.43,902.476 5668.34,886.85 5668.34,867.617C5668.34,850.788 5662.53,837.165 5650.91,826.747C5645.3,821.539 5635.48,814.326 5621.46,805.111C5607.44,795.895 5588.4,784.876 5564.36,772.054C5521.89,748.414 5492.44,725.375 5476.01,702.937C5459.59,679.296 5451.37,650.447 5451.37,616.389C5451.37,565.102 5470.2,522.63 5507.87,488.972C5545.53,455.315 5593.41,438.487 5651.51,438.487C5715.62,438.487 5774.72,465.533 5828.81,519.625ZM4335.99,734.791C4335.99,821.338 4305.94,894.062 4245.84,952.962C4186.14,1011.86 4112.41,1041.31 4024.66,1041.31C3932.91,1041.31 3857.98,1013.47 3799.88,957.77C3741.38,901.675 3712.13,830.754 3712.13,745.008C3712.13,657.259 3742.38,584.335 3802.89,526.236C3863.79,467.736 3939.92,438.487 4031.27,438.487C4121.03,438.487 4194.15,466.134 4250.65,521.428C4307.54,575.92 4335.99,647.042 4335.99,734.791ZM4946.99,457.118L4906.72,786.479C4903.52,814.527 4899.51,838.968 4894.7,859.804C4889.9,880.639 4884.69,898.069 4879.08,912.093C4867.86,938.938 4849.03,962.779 4822.58,983.614C4777.7,1018.87 4718.6,1036.5 4645.28,1036.5C4575.56,1036.5 4519.86,1018.67 4478.19,983.013C4436.52,946.952 4415.69,898.67 4415.69,838.167C4415.69,828.951 4416.19,818.133 4417.19,805.712C4418.19,793.29 4419.69,779.066 4421.7,763.039L4458.96,457.118L4591.79,457.118L4552.72,775.059C4551.12,788.683 4549.92,800.603 4549.11,810.82C4548.31,821.038 4547.91,829.552 4547.91,836.364C4547.91,896.065 4582.97,925.916 4653.09,925.916C4691.16,925.916 4719.2,916.099 4737.23,896.466C4755.27,876.833 4767.29,842.374 4773.3,793.09L4814.77,457.118L4946.99,457.118ZM2035.88,457.118L1995.61,786.479C1992.4,814.527 1988.4,838.968 1983.59,859.804C1978.78,880.639 1973.57,898.069 1967.96,912.093C1956.74,938.938 1937.91,962.779 1911.47,983.614C1866.59,1018.87 1807.49,1036.5 1734.16,1036.5C1664.44,1036.5 1608.75,1018.67 1567.08,983.013C1525.41,946.952 1504.57,898.67 1504.57,838.167C1504.57,828.951 1505.07,818.133 1506.08,805.712C1507.08,793.29 1508.58,779.066 1510.58,763.039L1547.85,457.118L1680.67,457.118L1641.61,775.059C1640,788.683 1638.8,800.603 1638,810.82C1637.2,821.038 1636.8,829.552 1636.8,836.364C1636.8,896.065 1671.86,925.916 1741.98,925.916C1780.04,925.916 1808.09,916.099 1826.12,896.466C1844.15,876.833 1856.17,842.374 1862.18,793.09L1903.65,457.118L2035.88,457.118ZM1170.88,262.909L1097.62,262.909L842.881,566.5L1024.22,350.385C1104.2,393.672 1158.57,478.326 1158.57,575.579C1158.57,672.833 1104.2,757.487 1024.22,800.774L1097.62,888.249L1170.88,888.249L1170.88,1023.48L1034.57,1023.48L808.945,754.596L808.945,1023.48L673.715,1023.48L673.715,127.679L808.945,127.679L808.945,396.562L1034.57,127.679L1170.88,127.679L1170.88,262.909ZM1354.56,1023.28L1221.73,1023.28L1291.45,457.118L1424.28,457.118L1354.56,1023.28ZM2796.29,1023.28L2663.47,1023.28L2733.18,457.118L2866.01,457.118L2796.29,1023.28ZM5134.87,1023.28L5002.05,1023.28L5071.77,457.118L5204.59,457.118L5198.58,505.801C5243.46,463.329 5288.73,442.093 5334.41,442.093C5374.48,442.093 5410.94,456.718 5443.8,485.967L5359.05,595.354C5334.61,574.518 5310.17,564.1 5285.73,564.1C5268.9,564.1 5254.07,567.406 5241.25,574.017C5228.43,580.628 5217.31,591.046 5207.9,605.27C5198.48,619.495 5190.67,637.826 5184.46,660.264C5178.25,682.702 5173.34,709.548 5169.73,740.801L5134.87,1023.28ZM3824.76,223.32L3612.6,223.32L3514.03,1023.28L3376.4,1023.28L3474.97,223.32L3253.19,223.32L3268.82,95.302L3840.39,95.302L3824.76,223.32ZM2223.76,1023.28L2090.93,1023.28L2215.94,8.154L2348.77,8.154L2266.43,677.093L2504.43,457.118L2681.74,457.118L2384.83,715.558L2623.44,1023.28L2462.96,1023.28L2256.81,754.024L2223.76,1023.28ZM167.237,342.463L128.187,348.971L128.187,962.842L167.237,956.333L167.237,342.463ZM50.083,316.429L37.066,322.938L37.066,936.804L50.083,930.296L50.083,316.429ZM4201.96,728.18C4201.96,673.687 4186.14,630.614 4154.48,598.96C4122.83,566.104 4081.36,549.676 4030.07,549.676C3976.78,549.676 3932.71,567.907 3897.85,604.369C3862.99,641.232 3845.56,687.51 3845.56,743.205C3845.56,799.301 3861.99,844.377 3894.84,878.435C3927.7,913.295 3970.17,930.724 4022.26,930.724C4074.35,930.724 4117.22,911.692 4150.88,873.627C4184.94,835.963 4201.96,787.481 4201.96,728.18ZM395.037,199.275L290.899,251.342L290.899,923.788L395.037,871.721L395.037,199.275ZM17.541,283.888L4.52,290.396L4.52,904.263L17.541,897.754L17.541,283.888ZM596.803,814.338L595.803,814.338C566.27,791.196 525.12,776.833 479.649,776.833C459.003,776.833 439.249,779.792 421.07,785.192L421.07,291.513C439.249,284.483 459.003,280.633 479.649,280.633C525.641,280.633 567.199,299.754 596.803,330.471L596.803,814.338ZM1465.75,187.86C1465.75,207.093 1458.74,223.721 1444.71,237.745C1430.69,251.769 1413.86,258.781 1394.23,258.781C1374.59,258.781 1357.56,251.568 1343.14,237.144C1329.11,221.918 1322.1,204.488 1322.1,184.855C1322.1,165.221 1328.91,148.593 1342.54,134.97C1356.56,120.946 1373.19,113.934 1392.42,113.934C1412.06,113.934 1429.09,121.347 1443.51,136.172C1458.33,150.597 1465.75,167.826 1465.75,187.86ZM2907.48,187.86C2907.48,207.093 2900.47,223.721 2886.45,237.745C2872.42,251.769 2855.59,258.781 2835.96,258.781C2816.33,258.781 2799.3,251.568 2784.87,237.144C2770.85,221.918 2763.84,204.488 2763.84,184.855C2763.84,165.221 2770.65,148.593 2784.27,134.97C2798.3,120.946 2814.92,113.934 2834.16,113.934C2853.79,113.934 2870.82,121.347 2885.24,136.172C2900.07,150.597 2907.48,167.826 2907.48,187.86Z"
                                            style="fill:white;stroke:white;stroke-width:62.5px;"></path>
                                    </g>
                                    <g transform="matrix(4.16667,0,0,4.16667,50.1992,159.846)">
                                        <g transform="matrix(1,0,0,1,0,-27)">
                                            <path
                                                d="M251.248,34.28L283.963,34.28L283.963,66.735L266.382,66.735L203.415,141.776L266.382,216.817L283.963,216.817L283.963,249.272L251.248,249.272L197.099,184.74L197.099,249.272L164.644,249.272L164.644,34.28L197.099,34.28L197.099,98.812L251.248,34.28Z"
                                                style="fill:rgb(53,35,83);"></path>
                                        </g>
                                        <g transform="matrix(1,0,0,1,0,-27)">
                                            <path d="M198.099,141.776L164.644,205.699L164.644,77.853L198.099,141.776Z"
                                                style="fill:rgb(252,113,0);"></path>
                                        </g>
                                        <g transform="matrix(1,0,0,1,0,-27)">
                                            <path
                                                d="M248.766,87.729C267.96,98.118 281.009,118.435 281.009,141.776C281.009,165.117 267.96,185.434 248.766,195.823L203.415,141.776L248.766,87.729Z"
                                                style="fill:rgb(255,216,0);"></path>
                                        </g>
                                        <path
                                            d="M146.185,172.078L145.945,172.078C138.857,166.524 128.981,163.077 118.068,163.077C113.113,163.077 108.372,163.787 104.009,165.083L104.009,46.6C108.372,44.913 113.113,43.989 118.068,43.989C129.106,43.989 139.08,48.578 146.185,55.95L146.185,172.078Z"
                                            style="fill:rgb(252,113,0);"></path>
                                        <path
                                            d="M97.761,24.463L72.768,36.959L72.768,198.346L97.761,185.85L97.761,24.463Z"
                                            style="fill:rgb(252,113,0);"></path>
                                        <path d="M66.52,15.09L50.899,24.463L50.899,229.587L66.52,220.215L66.52,15.09Z"
                                            style="fill:rgb(252,113,0);"></path>
                                        <path
                                            d="M43.089,58.828L33.717,60.39L33.717,207.719L43.089,206.157L43.089,58.828Z"
                                            style="fill:rgb(255,216,0);"></path>
                                        <path
                                            d="M27.468,27.587L19.658,24.463L19.658,235.836L27.468,238.96L27.468,27.587Z"
                                            style="fill:rgb(255,216,0);"></path>
                                        <path d="M14.972,52.58L11.848,54.142L11.848,201.47L14.972,199.908L14.972,52.58Z"
                                            style="fill:rgb(255,216,0);"></path>
                                        <path d="M7.162,44.77L4.037,46.332L4.037,193.66L7.162,192.098L7.162,44.77Z"
                                            style="fill:rgb(255,216,0);"></path>
                                    </g>
                                    <g transform="matrix(9.92657,0,0,9.92657,-2732.6,-314.063)">
                                        <g transform="matrix(124,0,0,124,399.266,141.02)">
                                            <path
                                                d="M0.242,-0.679C0.242,-0.663 0.236,-0.65 0.225,-0.638C0.213,-0.627 0.2,-0.621 0.184,-0.621C0.168,-0.621 0.154,-0.627 0.142,-0.639C0.131,-0.651 0.125,-0.665 0.125,-0.681C0.125,-0.697 0.131,-0.711 0.142,-0.722C0.153,-0.733 0.167,-0.739 0.182,-0.739C0.198,-0.739 0.212,-0.733 0.224,-0.721C0.236,-0.709 0.242,-0.695 0.242,-0.679ZM0.208,-0.46L0.151,-0L0.043,-0L0.1,-0.46L0.208,-0.46Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,425.095,141.02)">
                                            <path
                                                d="M0.497,-0.46L0.464,-0.192C0.461,-0.17 0.458,-0.15 0.454,-0.133C0.45,-0.116 0.446,-0.102 0.441,-0.09C0.432,-0.069 0.417,-0.049 0.396,-0.032C0.359,-0.004 0.311,0.011 0.251,0.011C0.195,0.011 0.15,-0.004 0.116,-0.033C0.082,-0.062 0.065,-0.101 0.065,-0.15C0.065,-0.158 0.065,-0.167 0.066,-0.177C0.067,-0.187 0.068,-0.198 0.07,-0.211L0.1,-0.46L0.208,-0.46L0.176,-0.202C0.175,-0.191 0.174,-0.181 0.173,-0.173C0.173,-0.164 0.172,-0.157 0.172,-0.152C0.172,-0.103 0.201,-0.079 0.258,-0.079C0.289,-0.079 0.312,-0.087 0.326,-0.103C0.341,-0.119 0.351,-0.147 0.355,-0.187L0.389,-0.46L0.497,-0.46Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,486.768,141.02)">
                                            <path
                                                d="M0.253,-0.825L0.187,-0.281L0.38,-0.46L0.524,-0.46L0.283,-0.25L0.477,-0L0.346,-0L0.179,-0.219L0.152,-0L0.044,-0L0.146,-0.825L0.253,-0.825Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,544.506,141.02)">
                                            <path
                                                d="M0.242,-0.679C0.242,-0.663 0.236,-0.65 0.225,-0.638C0.213,-0.627 0.2,-0.621 0.184,-0.621C0.168,-0.621 0.154,-0.627 0.142,-0.639C0.131,-0.651 0.125,-0.665 0.125,-0.681C0.125,-0.697 0.131,-0.711 0.142,-0.722C0.153,-0.733 0.167,-0.739 0.182,-0.739C0.198,-0.739 0.212,-0.733 0.224,-0.721C0.236,-0.709 0.242,-0.695 0.242,-0.679ZM0.208,-0.46L0.151,-0L0.043,-0L0.1,-0.46L0.208,-0.46Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,602.401,141.02)">
                                            <path
                                                d="M0.348,-0.65L0.268,-0L0.156,-0L0.236,-0.65L0.056,-0.65L0.068,-0.754L0.533,-0.754L0.52,-0.65L0.348,-0.65Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,649.966,141.02)">
                                            <path
                                                d="M0.552,-0.234C0.552,-0.164 0.527,-0.105 0.479,-0.057C0.43,-0.009 0.37,0.015 0.299,0.015C0.224,0.015 0.163,-0.008 0.116,-0.053C0.069,-0.099 0.045,-0.156 0.045,-0.226C0.045,-0.297 0.069,-0.357 0.119,-0.404C0.168,-0.451 0.23,-0.475 0.304,-0.475C0.377,-0.475 0.437,-0.453 0.482,-0.408C0.529,-0.363 0.552,-0.306 0.552,-0.234ZM0.443,-0.24C0.443,-0.284 0.43,-0.319 0.404,-0.345C0.379,-0.371 0.345,-0.385 0.303,-0.385C0.26,-0.385 0.224,-0.37 0.196,-0.34C0.167,-0.31 0.153,-0.273 0.153,-0.228C0.153,-0.182 0.167,-0.145 0.193,-0.118C0.22,-0.089 0.255,-0.075 0.297,-0.075C0.339,-0.075 0.374,-0.091 0.401,-0.122C0.429,-0.152 0.443,-0.192 0.443,-0.24Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,718.36,141.02)">
                                            <path
                                                d="M0.497,-0.46L0.464,-0.192C0.461,-0.17 0.458,-0.15 0.454,-0.133C0.45,-0.116 0.446,-0.102 0.441,-0.09C0.432,-0.069 0.417,-0.049 0.396,-0.032C0.359,-0.004 0.311,0.011 0.251,0.011C0.195,0.011 0.15,-0.004 0.116,-0.033C0.082,-0.062 0.065,-0.101 0.065,-0.15C0.065,-0.158 0.065,-0.167 0.066,-0.177C0.067,-0.187 0.068,-0.198 0.07,-0.211L0.1,-0.46L0.208,-0.46L0.176,-0.202C0.175,-0.191 0.174,-0.181 0.173,-0.173C0.173,-0.164 0.172,-0.157 0.172,-0.152C0.172,-0.103 0.201,-0.079 0.258,-0.079C0.289,-0.079 0.312,-0.087 0.326,-0.103C0.341,-0.119 0.351,-0.147 0.355,-0.187L0.389,-0.46L0.497,-0.46Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,780.033,141.02)">
                                            <path
                                                d="M0.208,-0.46L0.204,-0.42C0.24,-0.455 0.277,-0.472 0.314,-0.472C0.347,-0.472 0.376,-0.46 0.403,-0.437L0.334,-0.348C0.314,-0.365 0.294,-0.373 0.274,-0.373C0.261,-0.373 0.249,-0.37 0.238,-0.365C0.228,-0.36 0.219,-0.351 0.211,-0.34C0.204,-0.328 0.197,-0.313 0.192,-0.295C0.187,-0.277 0.183,-0.255 0.18,-0.229L0.152,-0L0.044,-0L0.101,-0.46L0.208,-0.46Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                        <g transform="matrix(124,0,0,124,822.331,141.02)">
                                            <path
                                                d="M0.375,-0.409L0.313,-0.348C0.285,-0.374 0.258,-0.387 0.234,-0.387C0.217,-0.387 0.204,-0.382 0.193,-0.373C0.182,-0.364 0.176,-0.352 0.176,-0.338C0.176,-0.325 0.181,-0.314 0.19,-0.305C0.199,-0.295 0.218,-0.283 0.247,-0.267C0.288,-0.243 0.316,-0.222 0.33,-0.203C0.345,-0.184 0.353,-0.16 0.353,-0.129C0.353,-0.086 0.337,-0.051 0.307,-0.024C0.276,0.002 0.236,0.015 0.187,0.015C0.119,0.015 0.063,-0.016 0.019,-0.077L0.09,-0.126C0.119,-0.091 0.15,-0.074 0.183,-0.074C0.201,-0.074 0.216,-0.079 0.227,-0.088C0.239,-0.098 0.244,-0.111 0.244,-0.126C0.244,-0.14 0.239,-0.151 0.23,-0.16C0.225,-0.164 0.217,-0.17 0.206,-0.177C0.195,-0.185 0.179,-0.194 0.16,-0.204C0.125,-0.223 0.101,-0.242 0.088,-0.26C0.075,-0.279 0.068,-0.303 0.068,-0.331C0.068,-0.372 0.083,-0.407 0.114,-0.434C0.144,-0.461 0.183,-0.475 0.23,-0.475C0.283,-0.475 0.331,-0.453 0.375,-0.409Z"
                                                style="fill:rgb(53,35,83);fill-rule:nonzero;"></path>
                                        </g>
                                    </g>
                                </svg>  --}}
                            </div>
                            <div class="tel-block">
                                <a href="tel:{{ get_component('phone_primary') }}">+1-876-654-5160</a></div>
                            <div class="social-links">
                                <ul>
                                    <li><a href="{{ get_component('social_facebook') }}" target="_blank"><i class="fab fa-facebook-f" target="_blank"></i></a></li>
                                    <li><a href="{{ get_component('social_insta') }}" target="_blank"><i class="fab fa-instagram" target="_blank"></i></a></li>
                                    <li><a href="{{ get_component('social_twitter') }}" target="_blank"><i class="fab fa-twitter" target="_blank"></i></a></li>
                                    <li><a href="{{ get_component('social_linkedin') }}" target="_blank"><i class="fab fa-linkedin" target="_blank"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="div-two">
                            {!! get_component('footer_advertisment') !!}
                        </div>
                        <div class="div-three">
                            {!! get_component('footer_quicklinks') !!}
                        </div>
                    </div>

                </div>
                <hr class="hr-divider" />
                <div class="container">
                    <div class="logos-image">
                        <div class="d-flex flex-wrap justify-content-center flex-logos">
                            <div class="logos-col"><img src="/assets/web/images/powered-by-fac-web.gif"
                                    class="image1" /></div>
                            <div class="logos-col">
                                <div class="block-icon">
                                    <!--?xml version="1.0" encoding="UTF-8"?--> <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 131.39 86.9" style="width:70px;">
                                        <defs>
                                            <style>
                                                .a {
                                                    opacity: 0;
                                                }

                                                .b {
                                                    fill: #fff;
                                                }

                                                .c {
                                                    fill: #ff5f00;
                                                }

                                                .d {
                                                    fill: #eb001b;
                                                }

                                                .e {
                                                    fill: #f79e1b;
                                                }
                                            </style>
                                        </defs>
                                        <title>Asset 1</title>
                                        <g class="a">
                                            <rect class="b" width="131.39" height="86.9"></rect>
                                        </g>
                                        <rect class="c" x="48.37" y="15.14" width="34.66" height="56.61"></rect>
                                        <path class="d"
                                            d="M51.94,43.45a35.94,35.94,0,0,1,13.75-28.3,36,36,0,1,0,0,56.61A35.94,35.94,0,0,1,51.94,43.45Z">
                                        </path>
                                        <path class="e"
                                            d="M120.5,65.76V64.6H121v-.24h-1.19v.24h.47v1.16Zm2.31,0v-1.4h-.36l-.42,1-.42-1h-.36v1.4h.26V64.7l.39.91h.27l.39-.91v1.06Z">
                                        </path>
                                        <path class="e"
                                            d="M123.94,43.45a36,36,0,0,1-58.25,28.3,36,36,0,0,0,0-56.61,36,36,0,0,1,58.25,28.3Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="logos-col"><img
                                    src="/assets/web/images/sc-mastercard-securecode.png"
                                    class="image2" /></div>
                            <div class="logos-col">
                                <div class="block-icon">
                                    <!--?xml version="1.0" encoding="UTF-8" standalone="no"?--> <svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:serif="http://www.serif.com/" width="100%" height="100%"
                                        viewBox="0 0 220 72" xml:space="preserve"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421; width:70px;">
                                        <g transform="matrix(1,0,0,1,2,1)">
                                            <path
                                                d="M106.949,1.476L92.516,68.945L75.06,68.945L89.498,1.476L106.949,1.476ZM180.381,45.04L189.569,19.707L194.858,45.04L180.381,45.04ZM199.857,68.945L216,68.945L201.909,1.476L187.012,1.476C183.661,1.476 180.836,3.423 179.582,6.424L153.393,68.945L171.716,68.945L175.357,58.866L197.748,58.866L199.857,68.945ZM154.3,46.916C154.378,29.111 129.677,28.127 129.848,20.172C129.901,17.753 132.206,15.181 137.251,14.522C139.748,14.196 146.645,13.943 154.458,17.539L157.525,3.234C153.322,1.708 147.921,0.242 141.195,0.242C123.945,0.242 111.801,9.414 111.704,22.544C111.589,32.261 120.37,37.676 126.986,40.907C133.783,44.213 136.063,46.335 136.038,49.291C135.987,53.82 130.614,55.816 125.591,55.895C116.816,56.031 111.723,53.523 107.665,51.632L104.505,66.417C108.579,68.288 116.107,69.92 123.914,70C142.251,70 154.243,60.946 154.3,46.916ZM82.008,1.476L53.73,68.945L35.281,68.945L21.364,15.1C20.519,11.785 19.787,10.568 17.218,9.174C13.022,6.895 6.094,4.759 0,3.433L0.411,1.476L30.111,1.476C33.895,1.476 37.3,3.993 38.16,8.354L45.51,47.398L63.675,1.476L82.008,1.476Z"
                                                style="fill:url(#_Linear1);"></path>
                                        </g>
                                        <defs>
                                            <linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0"
                                                gradientUnits="userSpaceOnUse"
                                                gradientTransform="matrix(218.527,0,0,-95.2504,-2.64809,35.1211)">
                                                <stop offset="0" style="stop-color:rgb(5,17,93);stop-opacity:1"></stop>
                                                <stop offset="1" style="stop-color:rgb(0,36,161);stop-opacity:1"></stop>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="logos-col"><img src="/assets/web/images/verified-by-visa.jpg"
                                    class="image3" /></div>
                            <div class="logos-col"><img src="/assets/web/images/gif-maker.png"
                                    class="image4" /></div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>© 2019 Kiuki Tours &amp; Transportation Ltd. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="object-wppu-preview">
                <div id="wppu-object-wrapper">
                    <div class="d-flex align-items-center justify-content-center wppu-object-logo">
                        <img class="lazyloaded" src="/assets/web/images/kiuki-tours-logo-crest.svg" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center wpppu-object-wrap" style="color:#352353;">
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/slick.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('assets/web/js/aos.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="{{ asset('assets/web/js/easyzoom.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/web/js/jquery.mmenu.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/web/js/custom.js') }}"></script>	

    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">
        jQuery(window).on('load', function() {
            jQuery('.object-wppu-preview').hide(); 
        });
        //AOS.init();
        AOS.init({
            easing: 'ease-out-back',
            duration: 2000
        });


        var j = jQuery.noConflict();
        j(function () {
            j('#responsive_menu').mmenu();
            j('html').addClass('mm-right mm-front');
            j('#responsive_menu').addClass('mm-right mm-front');
        });

        //Fixed Navbar	
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 400) {
                jQuery('#navbar_top').addClass('fixed');
                jQuery('#mobile-nav-header').addClass('fixed');
            } else {
                jQuery('#navbar_top').removeClass('fixed');
                jQuery('#mobile-nav-header').removeClass('fixed');
            }
        });

        jQuery(document).ready(function () {
            //Product Image Zoom
            var jQueryeasyzoom = jQuery('.easyzoom').easyZoom();

            //Select
            jQuery('.select2').select2();

            //Scroll Link
            jQuery('.scroll-link').click(function () {
                var sectionTo = $(this).attr('href');
                jQuery('html, body').animate({
                    scrollTop: $(sectionTo).offset().top
                }, 1500);
            });

            //Book Airport Transfers Form 
            jQuery(".booking-form-airport-button").click(function () {
                jQuery("#transfers-book-instantly").addClass("hide");
                jQuery("#book-airport-transfers-form").addClass("active");
                jQuery('html, body').animate({
                    scrollTop: jQuery("#book-airport-transfers-form").offset().top - 220
                }, 2000);
            });

            // Input Select Airline Number
            jQuery(".checkbox-input").change(function () {
                if (jQuery(this).prop('checked')) {
                    jQuery(this).parent().parent().addClass("active-check");

                } else {
                    jQuery(this).parent().parent().removeClass("active-check");
                }
            });

            //Book Tour Form 
            jQuery(".tour-booking-form-button").click(function () {
                jQuery("#tour-form-button-cover").addClass("hide");
                jQuery("#tour-booking-form").addClass("active");
                jQuery('html, body').animate({
                    scrollTop: jQuery("#tour-booking-form").offset().top - 220
                }, 2000);
            });

            //Search Bar
            jQuery(".search-link").click(function () {
                jQuery(".search-divblock").addClass("active");
            });
            jQuery(".buttonsearch").click(function () {
                jQuery(".search-divblock").removeClass("active");
            });

            //Home Slider
            jQuery('.home-topslider').slick({
                dots: false,
                prevArrow: false,
                nextArrow: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 959,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            //Home Slider
            jQuery('.gallery-slider').slick({
                dots: false,
                prevArrow: false,
                nextArrow: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            
			//Product Slider
			jQuery('.product-slider').slick({
				dots: false,
				prevArrow: '<span class="slick-slide-arrow prev-arrow"><i class="fa fa-chevron-left" style=""></i></span>',
				nextArrow: '<span class="slick-slide-arrow next-arrow"><i class="fa fa-chevron-right" style=""></i></span>',
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				responsive: [{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			});
        });
    </script>
    @yield('scripts')
    @include('includes.flash-message')
    @livewireScripts
</div>
</body>

</html>