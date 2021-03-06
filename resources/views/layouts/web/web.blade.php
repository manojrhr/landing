<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }} @yield('title')</title>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/web_old/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/jquery.fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/fonts/flaticon/font/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/aos.css') }}">
	<link href="{{ asset('assets/web_old/css/jquery.mb.ytplayer.min.css') }}" media="all" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/web_old/css/style.css') }}">

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

	@yield('styles')
    @livewireStyles
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	<div class="site-wrap">
		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>
		<div class="header-top bg-light">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-6 col-lg-3">
						<a class="logo" href="{{ route('home') }}">
							<h1>Amaze</h1>
							<!-- <img src="{{ asset('assets/web_old/images/logo.png') }}" alt="Image" class="img-fluid"> -->
						</a>
					</div>
					<div class="col-lg-9 d-none d-lg-block">
						<nav class="site-navigation position-relative text-right" role="navigation">
							<ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block navbar-nav ml-auto">
									@guest
									<li>
										<a href="{{ route('login') }}" class="nav-link text-left">Login</a>
									</li>
									<li>
										<a href="{{ route('register') }}" class="nav-link text-left">Sign up</a>
									</li>
									@else
									<li>
										<a href="{{ route('user.profile') }}" class="nav-link text-left">{{ Auth::user()->name }}</a>
									</li>	
									<li>
										<a href="{{ route('user.logout') }}" class="nav-link text-left">{{ __('Logout') }}</a>
									</li>	
			                        @endguest

								</nav>
							</div>


							<div class="col-6 d-block d-lg-none text-right">
								<a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black active"><span class="icon-menu h3"></span></a>
							</div>
						</div>
					</div>

      	@include('includes.flash-message')
      	@yield('content')

		<div class="footer bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 footer-content">
						<!-- <p class="mb-4"><img src=" {{ asset('assets/web_old/images/logo.png') }}" alt="Image" class="img-fluid"></p> -->
						<h1>Amaze</h1>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
						<!-- <p><a href="#">Learn More</a></p> -->
					</div>
					<div class="col-lg-3 footer-content">
						<h3 class="footer-heading"><span>Legal</span></h3>
						<!-- <ul class="list-unstyled">
							<li><a href="{{route('page','privacy_policy')}}">Privacy Policy</a></li>
							<li><a href="{{route('page','terms_of_service')}}">Terms of Use</a></li>
						</ul> -->
					</div>
					<div class="col-lg-3 footer-content">
						<h3 class="footer-heading"><span>Our Company</span></h3>
						<!-- <ul class="list-unstyled">
							<li><a href="#">About</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Our Team</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Projects</a></li>
						</ul> -->
					</div>
					<div class="col-lg-3 footer-content">
						<h3 class="footer-heading"><span>Contact</span></h3>
						<!-- <ul class="list-unstyled">
							<li><a href="#">Help Center</a></li>
							<li><a href="#">Support Community</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Our Partners</a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" /></svg></div>
	<script src="{{ asset('assets/web_old/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/aos.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.fancybox.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/jquery.mb.ytplayer.min.js') }}"></script>
	<script src="{{ asset('assets/web_old/js/main.js') }}"></script>
	<!-- <script async src="gtag/js_id_ua-23581568-13.js"></script> -->
	<!-- Alertify -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	@include('includes.flash-message')
	@yield('scripts')
    @livewireScripts
</html>