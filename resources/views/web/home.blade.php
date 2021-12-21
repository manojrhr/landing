@extends('layouts.web.master')


@section('content')
<!-- #Main Content-->
<div id="main-content">
   
    <audio id="welcome_audio" autoplay loop visibility hidden src="{{ asset('images/audio/kiuki_beat_short.mp3') }}">
   </audio>
    
    
  
    <div class="home-slider">
        <section class="home-topslider slider">
          
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider1.jpg') }}" data-lightbox="home-slider"
                        data-title="Doctor's Cave Beach, Montego Bay">
                        <img src="{{ asset('images/slider/home-slider1.jpg') }}">
                        <div class="slider-content-div">Doctor's Cave Beach, Montego Bay</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider2.jpg') }}" data-lightbox="home-slider"
                        data-title="Doctor's Cave Beach , Montego Bay">
                        <img src="{{ asset('images/slider/home-slider2.jpg') }}">
                        <div class="slider-content-div">Doctor's Cave Beach , Montego Bay</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider3.jpg') }}" data-lightbox="home-slider"
                        data-title="Appleton Rum Tour , St. Elizabeth">
                        <img src="{{ asset('images/slider/home-slider3.jpg') }}">
                        <div class="slider-content-div">Appleton Rum Tour , St. Elizabeth</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider4.jpg') }}" data-lightbox="home-slider"
                        data-title="Auchindown , Westmoreland">
                        <img src="{{ asset('images/slider/home-slider4.jpg') }}">
                        <div class="slider-content-div">Auchindown , Westmoreland</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider5.jpg') }}" data-lightbox="home-slider"
                        data-title="Margaritaville , Montego Bay">
                        <img src="{{ asset('images/slider/home-slider5.jpg') }}">
                        <div class="slider-content-div">Margaritaville , Montego Bay</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider6.jpg') }}" data-lightbox="home-slider"
                        data-title="Rick's Cafe , West End Negril">
                        <img src="{{ asset('images/slider/home-slider6.jpg') }}">
                        <div class="slider-content-div">Rick's Cafe , West End Negril</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider7.jpg') }}" data-lightbox="home-slider"
                        data-title="Black River, St. Elizabeth">
                        <img src="{{ asset('images/slider/home-slider7.jpg') }}">
                        <div class="slider-content-div">Black River, St. Elizabeth</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider8.jpg') }}" data-lightbox="home-slider"
                        data-title="Bob Marley 9 Miles Tour, St. Ann">
                        <img src="{{ asset('images/slider/home-slider8.jpg') }}">
                        <div class="slider-content-div">Bob Marley 9 Miles Tour, St. Ann</div>
                    </a>
                </div>
            </div>
            <div>
                <div class="inner-slide-cover">
                    <a href="{{ asset('images/slider/large-home-slider9.jpg') }}" data-lightbox="home-slider"
                        data-title="Rick's Cafe, West End Negril">
                        <img src="{{ asset('images/slider/home-slider9.jpg') }}">
                        <div class="slider-content-div">Rick's Cafe, West End Negril</div>
                    </a>
                </div>
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
                                <div class="images-block" data-aos="zoom-in-left" data-aos-once="true">
                                    <img src="{{ asset($category->image) }}" alt="" />
                                </div>
                                <div class="content-div-col {{ $i === 1 ? "one-block" : "" }}" data-aos="fade-{{ $i === 1  ? "Left" : "" }}{{ $i === 2  ? "up" : "" }}{{ $i === 3  ? "right" : "" }}" data-aos-once="true">
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

    <!-- Section About One -->
    <div class="section-about-one">
        <div class="container">
            {{-- <div class="sub-heading-content">About Us</div> --}}
            <h2 class="about-heading-title">Our Mission</h2>
            <div class="row no-margin">
                <div class="col-md-12 about-one-half">
                    <p>Kuiki Tours provides quality and excellent service without compromise of customer service and
                        safety. Our mantra “Shine with Excellence” allows us to collaborate with various entities to
                        provide effective and efficient service, all to serve you better.</p>
                    <p>Our modern fleet management system can mobilize over 1500 seats for your conference or special
                        event. Town cars with drivers can help you to explore the island or do it on your time and at
                        your pace. We are here to help you make the best of your vacation, meeting or event in Jamaica.
                    </p>
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
                                    <div class="product-excerpt">{!! substr($tour->description, 0, 50) !!}</div>
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
{{-- </div> --}}
<!-- End #Main Content-->
    
@endsection

@section('scripts')
<script>
    document.addEventListener('click', musicPlay);
    function musicPlay() {
        document.getElementById('welcome_audio').play();
        document.removeEventListener('click', musicPlay);
    }
</script>
@endsection