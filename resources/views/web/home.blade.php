@extends('layouts.web.master')


@section('content')
<!-- #Main Content-->
<div id="main-content">
    <div class="home-slider">
        <section class="home-topslider slider">
            <div>
                <img src="{{ asset('assets/web/images/slider2.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('assets/web/images/slider3.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('assets/web/images/slider4.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('assets/web/images/slider5.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('assets/web/images/slider6.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('assets/web/images/slider7.jpg') }}">
            </div>
        </section>
    </div>

    <!-- Section Home One -->
    <div class="section-home-one">
        <div class="container">
            <div class="small-container">

                <div class="row align-items-end home-one">
                    @php $i=1; @endphp
                    @foreach ($categories as $category)
                    <div class="col-md-4 block-order{{ $i }}">
                        <a href="{{ url($category->slug) }}">
                            <div class="inner-block">
                                <div class="images-block" data-aos="zoom-in-left">
                                    <img src="{{ asset($category->image) }}" alt="" />
                                </div>
                                <div class="content-div-col {{ $i === 1 ? "one-block" : "" }}" data-aos="fade-left">
                                    @if($i === 1)
                                        <h3><i>{{ $category->title }}</i></h3>
                                        <h2>{{ $category->subtitle }}</h2>
                                    @else
                                        <h2>{{ $category->title }}</h2>
                                        <h4><i>{{ $category->subtitle }}</i></h4>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Section Two -->
<div class="section-two">
    <div class="container">
        <div class="row align-items-center no-margin">
            <div class="col-md-6">
                <div class="sub-heading">Personalized Transportation</div>
                <h4 class="main-heading">First-Class Impressions.</h4>
                <hr class="divider" />
                <p class="no-margin">Kiuki Tours is pleased to offer professional transportation for visitors, business
                    executives, and various groups to their destination throughout Jamaica.</p>
            </div>
            <div class="col-md-6">
                <div class="gallery-row mobile-hide">
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img1.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img2.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img3.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img4.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img5.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="gallery-col">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/web/images/img6.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>

                <div class="gallery-slider-cover mobile-show" style="display:none;">
                    <div class="gallery-slider">
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img1.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img3.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img4.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img5.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div>
                            <div class="gallery-innerdiv">
                                <img src="{{ asset('assets/web/images/img6.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Section Three -->
<div class="section-three">
    <div class="container">
        <div class="section-title">
            <h2>Explore Jamaica</h2>
        </div>
        <div class="slider-product">
            <div class="slider-product-div">

                <section class="product-slider slider">
                    @foreach ($tours as $tour)
                    <div>
                        <div class="product-innerblock">
                            <div class="product-thumbnail">
                                <img src="{{ asset($tour->image) }}" alt="">
                            </div>
                            <div class="d-flex align-items-center product-item-content">
                                <div class="inner-product-content">
                                    <h2><a href="{{ route('tour.single', $tour->slug) }}">{{ $tour->title }}</a></h2>
                                    <div class="product-excerpt">{{ substr($tour->description, 0, 50) }}</div>
                                    <div class="more-btn-cover"><a class="more-btn" href="{{ route('tour.single', $tour->slug) }}">More
                                            Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div>
                        <div class="product-innerblock">
                            <div class="product-thumbnail">
                                <img src="{{ asset('assets/web/images/product2.jpg') }}" alt="">
                            </div>
                            <div class="d-flex align-items-center product-item-content">
                                <div class="inner-product-content">
                                    <h2><a href="#">Chill In Negril and Rick’s Café</a></h2>
                                    <div class="product-excerpt">Enjoy the scenic drive to the relaxed town
                                        of Negril. Stop and enjoy scenic views while en route to a day
                                        filled with sun and shopping.</div>
                                    <div class="more-btn-cover"><a class="more-btn" href="#">More
                                            Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-innerblock">
                            <div class="product-thumbnail">
                                <img src="{{ asset('assets/web/images/product3.jpg') }}" alt="">
                            </div>
                            <div class="d-flex align-items-center product-item-content">
                                <div class="inner-product-content">
                                    <h2><a href="#">Lil’ Dipper</a></h2>
                                    <div class="product-excerpt">Enjoy a guided tour through the River
                                        Gardens, while learning a brief history of our original inhabitants
                                        – the Taino Indians.</div>
                                    <div class="more-btn-cover"><a class="more-btn" href="#">More
                                            Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="product-innerblock">
                            <div class="product-thumbnail">
                                <img src="{{ asset('assets/web/images/product1.jpg') }}" alt="">
                            </div>
                            <div class="d-flex align-items-center product-item-content">
                                <div class="inner-product-content">
                                    <h2><a href="#">Double Dipper</a></h2>
                                    <div class="product-excerpt">Explore the natural wonder that is Konoko
                                        Falls. Enjoy a guided tour through the River Gardens, while learning
                                        a brief history of our original inhabitants – the Taino Indians.
                                    </div>
                                    <div class="more-btn-cover"><a class="more-btn" href="#">More
                                            Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </section>
            </div>
            <div class="more-tour-cover">
                <a href="{{ route('tours') }}" class="btn-more-tour"><span class="arrow-span"><i aria-hidden="true"
                            class="fas fa-long-arrow-alt-right"></i></span><span class="text-span">More
                        Tours <i aria-hidden="true" class="fas fa-long-arrow-alt-right"></i></span></a>
            </div>
        </div>
    </div>
</div>

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

<!-- Section Five -->
{{-- <div class="section-five">
    <div class="container">
        <div class="block-populated">
            <h2 class="heading-title">OUR LATEST BLOGS/NEWS</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="image-block">
                        <img src="{{ asset('assets/web/images/blogimage.jpg') }}" alt="" />
                    </div>
                    <div class="content-blog">
                        <h4><a href="#">Hello world!</a></h4>
                        <div class="post-meta">
                            <span>October 25, 2019</span>
                            <span class="cat-span"><a href="#">Uncategorized</a></span>
                        </div>
                        <div class="blog-post-excerpt">
                            <p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>
                        </div>
                        <a href="#" class="post-read-more">Read More<i aria-hidden="true"
                                class="fa-fw fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
</div>
<!-- End #Main Content-->
    
@endsection