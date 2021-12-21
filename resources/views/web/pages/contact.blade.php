@extends('layouts/web/master')

@section('styles')

@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Banner -->
    <div class="bg-fixed banner banner-one">
        <div class="banner-shape-bottom" data-negative="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2600 131.1" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M0 0L2600 0 2600 69.1 0 0z"></path>
                <path class="elementor-shape-fill" style="opacity:0.5" d="M0 0L2600 0 2600 69.1 0 69.1z"></path>
                <path class="elementor-shape-fill" style="opacity:0.25" d="M2600 0L0 0 0 130.1 2600 69.1z"></path>
            </svg>
        </div>
        <div class="inner-banner">
            <div class="container">
                <div class="banner-content" data-aos="fade-right">
                    <h1 class="page-heading-title">Contact Us</h1>
                    <ul class="social-icon-banner">
                        <li><a href="{{ get_component('social_facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ get_component('social_insta') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Contact One -->
    <div class="section-contact-one">
        <div class="container">
            <div class="row no-margin section-boxed-row">
                <div class="col section-boxed-left">
                    <div class="contact-section-boxed">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-image">
                                <div class="logo_svg__inner">
                                    <!--?xml version="1.0" encoding="UTF-8" standalone="no"?--> <svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:serif="http://www.serif.com/" width="100%" height="100%"
                                        viewBox="0 0 512 512" xml:space="preserve"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                        <g transform="matrix(1.78619,0,0,1.78619,-1.21083,36.0847)">
                                            <path
                                                d="M233.836,7.28L283.963,7.28L283.963,49.65L258.298,49.65L220.697,114.776L258.298,179.902L283.963,179.902L283.963,222.272L269.91,222.272L233.836,222.272L195.73,156.271L195.73,222.272L153.361,222.272L153.361,7.28L195.73,7.28L195.73,73.281L233.836,7.28Z"
                                                style="fill:rgb(53,35,83);"></path>
                                            <path
                                                d="M247.131,68.992C268.182,73.589 283.963,92.354 283.963,114.776C283.963,137.198 268.182,155.963 247.131,160.56L220.697,114.776L247.131,68.992Z"
                                                style="fill:rgb(255,216,0);"></path>
                                            <path d="M197.099,114.776L153.361,31.206L153.361,198.346L197.099,114.776Z"
                                                style="fill:rgb(252,113,0);"></path>
                                            <path
                                                d="M146.185,172.078L145.945,172.078C138.857,166.524 128.981,163.077 118.068,163.077C113.113,163.077 108.372,163.787 104.009,165.083L104.009,46.6C108.372,44.913 113.113,43.989 118.068,43.989C129.106,43.989 139.08,48.578 146.185,55.95L146.185,172.078Z"
                                                style="fill:rgb(252,113,0);"></path>
                                            <path
                                                d="M97.761,24.463L72.768,36.959L72.768,198.346L97.761,185.85L97.761,24.463Z"
                                                style="fill:rgb(252,113,0);"></path>
                                            <path
                                                d="M66.52,15.09L50.899,24.463L50.899,229.587L66.52,220.215L66.52,15.09Z"
                                                style="fill:rgb(252,113,0);"></path>
                                            <path
                                                d="M43.089,58.828L33.717,60.39L33.717,207.719L43.089,206.157L43.089,58.828Z"
                                                style="fill:rgb(255,216,0);"></path>
                                            <path
                                                d="M27.468,27.587L19.658,24.463L19.658,235.836L27.468,238.96L27.468,27.587Z"
                                                style="fill:rgb(255,216,0);"></path>
                                            <path
                                                d="M14.972,52.58L11.848,54.142L11.848,201.47L14.972,199.908L14.972,52.58Z"
                                                style="fill:rgb(255,216,0);"></path>
                                            <path d="M7.162,44.77L4.037,46.332L4.037,193.66L7.162,192.098L7.162,44.77Z"
                                                style="fill:rgb(255,216,0);"></path>
                                        </g>
                                    </svg> </div>
                            </div>
                            <div class="col-content">{!! get_component('contact_page_text') !!}</div>
                        </div>
                    </div>
                    <div class="contact-form-block">
                        <h4 class="heading-title-h4 text-center">Send Us a Message</h4>
                    </div>
                </div>
                <div class="col section-boxed-right">
                    <div data-aos="fade-left">
                        <h4 class="sidebar-heading-title">Call Us</h4>
                        <div class="contact-info-box">
                            <div class="icon-box-icon">
                                <a class="icon-animation-float" href="tel:{{ get_component('phone_primary') }}">
                                    <i aria-hidden="true" class="fas fa-phone-alt"></i>
                                </a>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">
                                    <a href="tel:{{ get_component('phone_primary') }}">Primary</a>
                                </h4>
                                <p class="icon-box-description">{{ get_component('phone_primary') }}</p>
                            </div>
                        </div>
                        <div class="contact-info-box">
                            <div class="icon-box-icon">
                                <a class="icon-animation-float no-bg" href="tel:{{ get_component('phone_secondary') }}">
                                    <i aria-hidden="true" class="fas fa-phone-alt"></i>
                                </a>
                            </div>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">
                                    <a href="tel:{{ get_component('phone_secondary') }}">Secondary</a>
                                </h4>
                                <p class="icon-box-description">{!! get_component('phone_secondary') !!}</p>
                            </div>
                        </div>
                        <h4 class="sidebar-heading-title">VISIT US</h4>
                        <div class="contact-info-box">
                            <div class="icon-box-icon">
                                <a class="icon-animation-float scroll-link" href="#kiuki-map">
                                    <i aria-hidden="true" class="fas fa-map-marked-alt"></i>
                                </a>
                            </div>
                            <div class="icon-box-content">{!! get_component('company_address') !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Map -->
    <div id="kiuki-map" class="contact-map-block">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.5440402333384!2d-77.92170178462102!3d18.459000275870896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eda2a85ca60245d%3A0x56ba2a0872ebf6c7!2sKiuki%20Tours!5e0!3m2!1sen!2sin!4v1624861455212!5m2!1sen!2sin"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!-- End #Main Content-->


@endsection