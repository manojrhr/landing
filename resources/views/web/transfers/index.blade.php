@extends('layouts.web.master')

@section('title', $category->meta_title)
@section('keywords', $category->meta_description)
@section('description', $category->meta_keywords)

@section('content')
<!-- #Main Content-->
<div id="main-content">
    <div class="section-transfers-one">
        <div class="container">
            <div class="block-airport-transfers">
                <div class="inner-airport-transfers">
                    <h2 class="transfers-heading-title">Airport Transfers (MBJ)</h2>
                    @if($subcategories->isEmpty())
                        <h3 class="text-center">Comming Soon</h3>
                    @else
                        <div class="steering-wheel-block">
                            <div class="steering-wheel-image" data-aos="steering-wheel" data-aos-once="true">
                                <img src="{{ asset('assets/web/images/kiuki-steering-wheel.png') }}" alt="" />
                            </div>
                            @foreach ($subcategories as $subcat)
                                <a href="{{ route('transfers.type',$subcat->slug) }}">
                                    <div class="{{ $loop->iteration === 1 ? 'bus-image-div' : '' }}
                                            {{ $loop->iteration === 2 ? 'privatecar-image-div' : '' }}
                                            {{ $loop->iteration === 3 ? 'luxurycar-image-div' : '' }}"
                                            data-aos="fade-{{ $loop->iteration === 1 ? 'left' : '' }}{{ $loop->iteration === 2 ? 'right' : '' }}{{ $loop->iteration === 3 ? 'in' : '' }}" 
                                            data-aos-delay="2000" data-aos-once="true">
                                        <img src="{{ asset($subcat->image) }}" />
                                    </div>
                                </a>
                            @endforeach
                            {{-- <div class="privatecar-image-div"><img src="{{ asset('assets/web/images/caiz2.png') }}" /></div>
                            <div class="luxurycar-image-div"><img src="{{ asset('assets/web/images/caiz1.png') }}" /></div> --}}
                            <div class="book-transfer">
                                <div class="book-arrow"><img src="{{ asset('assets/web/images/map-pointer.svg') }}"></div><a
                                    href="airport-transfers.html">Book your transfer!</a>
                            </div>
                            @foreach ($subcategories as $subcat)
                                <a href="">
                                    <div class="transfer-div {{ $loop->iteration === 1 ? 'shared' : '' }}{{ $loop->iteration === 2 ? 'private' : '' }}{{ $loop->iteration === 3 ? 'luxury' : '' }}-transfer" data-aos="zoom-in" data-aos-delay="2000" data-aos-once="true">
                                        {{ $subcat->title }}
                                    </div>
                                </a>
                            @endforeach
                            {{-- <a href=""><div class="transfer-div shared-transfer">Shared Transfer</div></a> --}}
                            {{-- <a href=""><div class="transfer-div private-transfer">Private Transfer</div></a>
                            <a href=""><div class="transfer-div luxury-transfer">Luxury Transfer</div></a> --}}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Section Two -->
            <div class="section-two mt-5">
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
        </div>
    </div>
</div>
<!-- End #Main Content-->

@endsection