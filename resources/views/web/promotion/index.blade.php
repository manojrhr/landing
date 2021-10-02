@extends('layouts.web.master')

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Banner -->
    <div class="banner-cover banner-promotions banner-normal">
        <div class="banner-background-overlay"></div>
        <div class="d-flex flex-wrap align-items-center justify-content-center inner-banner-normal">
            <div class="container">
                <div class="banner-content">
                    <h1 class="banner-heading-title">PROMOTIONS</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section-promotions-one">
        <div class="container">
            <div class="d-flex flex-wrap row-section-div">
                <div class="left-col-block">
                    <div class="inner-col-block">
                        <div class="promotions-section">
                            <div class="jet-listing-not-found">No Promotions available at this time.</div>
                        </div>
                    </div>
                </div>
                <div class="right-col-block">
                    <div class="inner-col-block">
                        <div class="tour-list-cover">
                            <h3 class="small-main-title">Tour Jamaica</h3>
                            <div class="d-flex flex-wrap tour-list-row">
                                @foreach ($tours as $tour)
                                <div class="d-flex tour-list-item">
                                    <div class="tour-thumbnail-div">
                                        <a class="tour-thumbnail-link" href="#">
                                            <img src="{{ asset($tour->image) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="tour-post-text">
                                        <h4 class="tour-post-title">
                                            <a href="{{ route('tour.single', $tour->slug) }}">{{ $tour->title }}</a>
                                        </h4>
                                        <a class="tour-post-read-more" href="{{ route('tour.single', $tour->slug) }}"> More Details »</a>
                                    </div>
                                </div>
                                @endforeach                                
                            </div>
                            <div class="jet-button-cover">
                                <a class="saltella more-button-link" href="{{ route('tours') }}">
                                    <span class="text-lable-link">More Tours</span>
                                    <span class="icon-link"><i aria-hidden="true"
                                            class="fas fa-long-arrow-alt-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="advertisement-block">
                            <div class="advertisement-content">
                                <div class="advertisement-info">Advertisement</div>
                            </div>
                        </div>
                        <div class="newsletters-block">
                            <div class="newsletters-content">
                                <div class="icon-newsletters"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <div class="title-newsletters">Newsletters</div>
                                <p class="form_not_found">Oops! We could not locate your form.</p>
                            </div>
                        </div>
                        <div class="tags-block">
                            <div class="tags-content">
                                <h3 class="tags-title">Popular Tags</h3>
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