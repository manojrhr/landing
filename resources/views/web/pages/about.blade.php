@extends('layouts/web/master')

@section('styles')

@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Banner -->
    <div class="bg-fixed banner banner-one">
        <div class="banner-shape-bottom" data-negative="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 19.6" preserveAspectRatio="none">
                <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 18.8 141.8 4.1 283.5 18.8 283.5 0z">
                </path>
                <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 12.6 141.8 4 283.5 12.6 283.5 0z">
                </path>
                <path class="elementor-shape-fill" style="opacity:0.33" d="M0 0L0 6.4 141.8 4 283.5 6.4 283.5 0z">
                </path>
                <path class="elementor-shape-fill" d="M0 0L0 1.2 141.8 4 283.5 1.2 283.5 0z"></path>
            </svg>
        </div>
        <div class="inner-banner">
            <div class="container">
                <div class="banner-content" data-aos="fade-right">
                    <h1 class="page-heading-title">About Us</h1>
                    <ul class="social-icon-banner">
                        <li><a href="{{ get_component('social_facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ get_component('social_insta') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Section About One -->
    <div class="section-about-one">
        <div class="container">
            <div class="sub-heading-content">About Us</div>
            <h2 class="about-heading-title">Our Mission</h2>
            <div class="row no-margin">
                <div class="col-md-6 about-one-half">
                    <p>Kuiki Tours provides quality and excellent service without compromise of customer service and
                        safety. Our mantra “Shine with Excellence” allows us to collaborate with various entities to
                        provide effective and efficient service, all to serve you better.</p>
                    <p>Our modern fleet management system can mobilize over 1500 seats for your conference or special
                        event. Town cars with drivers can help you to explore the island or do it on your time and at
                        your pace. We are here to help you make the best of your vacation, meeting or event in Jamaica.
                    </p>
                </div>
                <div class="col-md-6 about-one-half">
                </div>
            </div>
        </div>
    </div>


    <!-- Section About Two -->
    <div class="section-about-two">
        <div class="container">

            <div class="middle-container">
                <div class="row no-margin row-about-blog">
                    <div class="blockleft-block">
                        @php $post = get_latest_blog_post(); @endphp
                        @if($post)
                        <h4 class="heading-title-small">News &amp; Blogs</h4>
                        <div class="d-flex flex-wrap post-blog-item">
                            <div class="flex-shrink-0 post__thumbnail">
                                <a class="post-thumbnail-block" href="{{ route('blog.single', $post->slug) }}">
                                    <img src="{{ asset($post->feature_image) }}">
                                </a>
                            </div>
                            <div class="flex-grow-2 blog_post_text">
                                <h4 class="post_title">
                                    <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a>
                                </h4>
                                <div class="blog_post_meta_data">
                                    <span class="blog-post-date">{{ date("F j, Y", strtotime($post->created_at)) }}<</span>
                                </div>
                                <a class="blog_post_read-btn"
                                    href="{{ route('blog.single', $post->slug) }}">Read More »</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="blockright-block">
                        <h4 class="heading-title-small">CONNECT WITH US.</h4>
                        <p>Stay connected with us on social media about our latest news &amp; blogs.</p>
                        <ul class="link-social-icons-wrapper">
                            <li>
                                <a href="{{ get_component('social_facebook') }}" class="link-social-icon" target="_blank" rel="noopener">
                                    <i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{ get_component('social_insta') }}" class="link-social-icon insta-icon" target="_blank" rel="noopener">
                                    <i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>



</div>
<!-- End #Main Content-->


@endsection