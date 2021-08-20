@extends('layouts.web.master')

@section('title', $tour->title)

@section('content')
<!-- #Main Content-->
<div id="main-content">

    <!-- Tours Details Section One -->
    <div class="tours-details-section-one">

        <div class="tours-images-gallery-cover">
            <div class="tours-images-gallery">
                @foreach (json_decode($tour->photos) as $photo)
                    <div>
                        <div class="inner-tours-image-block">
                            <img src="{{ asset($photo) }}" alt="" />
                        </div>
                    </div>                    
                @endforeach
            </div>
            <div class="post-title-cover">
                <h1 class="post-title-tag">{{ $tour->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Tours Details Section Two -->
    <div class="tours-details-section-two">
        <div class="container">
            <div class="tours-details-cover">
                <div class="row flex-wrap no-margin tours-details-row">
                    <div class="col-details-content">
                        <div class="breadcrumb-block">
                            <nav class="d-flex flex-wrap justify-content-center nav-breadcrumb">
                                <a href="{{ route('home') }}">Home</a>&nbsp;/&nbsp;<a href="tours.html">Tours</a>&nbsp;/&nbsp;{{ $tour->title }}</nav>
                        </div>
                        <div class="tours-tabs">
                            <div class="nav nav-tours-tabs">
                                <a class="nav-item nav-link active" id="nav-description-tab" data-toggle="tab"
                                    href="#nav-description" role="tab" aria-controls="nav-description"
                                    aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews"
                                    role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews (0)</a>
                            </div>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                    aria-labelledby="nav-description-tab">
                                    <h3>Description</h3>
                                    <p class="no-margin">{{ $tour->description }}</p>
                                </div>
                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                    aria-labelledby="nav-reviews-tab">
                                    <h3>Reviews</h3>
                                    <p>There are no reviews yet.</p>
                                    <p>Only logged in customers who have purchased this product may leave a review.</p>
                                </div>
                            </div>
                        </div>
                        <hr class="divider-tour" />
                        <div class="photo-gallery">
                            <h3 class="photo-gallery-heading">Photo Gallery</h3>
                            <div class="d-flex flex-wrap justify-content-center flex-logos row-photo-gallery">
                                @foreach (json_decode($tour->photos) as $photo)
                                    <div class="gallery-block">
                                        <a href="{{ asset($photo) }}" data-lightbox="photos"><img class="img-fluid"
                                                src="{{ asset($photo) }}"></a>
                                    </div>                  
                                @endforeach
                            </div>
                        </div>
                        <hr class="divider-tour" />
                        <div class="tour-included-block">
                            <h3 class="tour-contant-heading">Included on This Tour</h3>
                            <p>{{ $tour->included }}</p>
                        </div>
                        <hr class="divider-tour" />
                        <div class="tour-additional-block">
                            <h3 class="tour-contant-heading">Additional Information</h3>
                            <p>{{ $tour->add_info }}</p>
                        </div>
                        <hr class="divider-tour" />
                        <div class="tour-post-prev-cover">
                            <a href="#" class="tour-post-prev-btn"><i aria-hidden="true"
                                    class="fas fa-caret-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="col-details-sidebar">
                        <div id="tour-form-button-cover" class="tour-form-button-cover">
                            <a href="#tour-booking-form" class="saltella tour-booking-button tour-booking-form-button"
                                role="button">Book this Tour!</a>
                        </div>
                        <div id="tour-form-button-fixed" class="tour-form-button-fixed" style="display:none;">
                            <a href="#tour-booking-form" class="tour-booking-button tour-booking-button-fixed"
                                role="button">Book this Tour!</a>
                        </div>
                        <div id="tour-booking-form" class="tour-booking-form-block">
                            <h3 class="tour-booking-form-title">Book This Tour Below</h3>

                            <div class="form-tour-booking-block">
                                <form>
                                    <div class="wc-bookings-booking-form">
                                        <div
                                            class="wc-bookings-date-picker wc-bookings-date-picker-booking wc_bookings_field_start_date">
                                            <div id="datepicker"></div>
                                        </div>
                                        <div class="wc-bookings-booking-cost"><strong>This booking date is
                                                available!</strong></div>
                                    </div>

                                    <div class="form-row-block">
                                        <span class="label-span">Pickup Location</span>
                                        <div class="select-form-input-div">
                                            <select class="form-control select2" id="location">
                                                @foreach ($options as $option)
                                                    <option value="{{ $option->location->id }}" data-adult="{{ $option->location->adult_rate }}
                                                         data-child="{{ $option->location->child_rate }}">{{ $option->location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row-block">
                                        <div class="d-flex flex-wrap row-form-div">
                                            <div class="one-half left-one-half">
                                                <span class="label-span">Number of Adults (Ages 12+)</span>
                                                <input class="input-box" type="number" value="1" min="1" step="1"
                                                    max="100" id="pickup_num_adults" required="">
                                                <span class="cost_per_text">$110 per Adult</span>
                                            </div>
                                            <div class="one-half right-one-half">
                                                <span class="label-span">Number of Children (Ages 3-11)</span>
                                                <input class="input-box" type="number" value="0" min="0" step="1"
                                                    max="100" id="pickup_num_children" required="">
                                                <span class="cost_per_text">$83 per Child</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row-block">
                                        <span class="label-span">Additional Pickup Information</span>
                                        <textarea class="textarea-box" rows="4" maxlength="500"
                                            id="adtl_pickup_info_input"></textarea>
                                    </div>
                                    <div class="tour_total_pricing">
                                        <h4 class="price_title">Total Tour Pricing</h4>
                                        <h4 class="price" id="tour_price">$110.00</h4>
                                    </div>
                                    <div class="submit-button-cover"><button type="submit"
                                            class="form-tour-booking-button single_add_to_cart_button button disabled"
                                            style="">Book now</button></div>
                                </form>
                            </div>

                        </div>
                        <hr class="divider-tour-border" />
                        <div class="social-share-cover">
                            <div class="social-share-title">Share with friends.</div>
                            <div class="d-flex flex-wrap justify-content-center social-share-links">
                                <div class="share-link-div"><a href="#" class="share-link twitter-share"><i
                                            class="fab fa-twitter" aria-hidden="true"></i></a></div>
                                <div class="share-link-div"><a href="#" class="share-link facebook-share"><i
                                            class="fab fa-facebook" aria-hidden="true"></i></a></div>
                                <div class="share-link-div"><a href="#" class="share-link pinterest-share"><i
                                            class="fab fa-pinterest" aria-hidden="true"></i></a></div>
                                <div class="share-link-div"><a href="#" class="share-link whatsapp-share"><i
                                            class="fab fa-whatsapp" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Tours Details Section Three -->
    <div class="tours-details-section-three">
        <div class="container">

            <div class="tours-like-posts">
                <h2 class="tours-like-title">You May Like</h2>
                <div class="row flex-wrap tours-like-row">

                    <div class="col-md-3 item-tours-like">
                        <div class="inner-item-tours">
                            <div class="image-tour-item">
                                <a class="img-tour-link" href="#"><img src="{{ asset('assets/web/images/1.jpg') }}" alt=""></a>
                                <div class="tour-quick-view-cover">
                                    <!-- Button trigger modal -->
                                    <div type="button" class="tour-quick-view" data-toggle="modal"
                                        data-target="#product_view">Quick View</div>
                                </div>

                            </div>
                            <div class="tour-item-content">
                                <div class="cat-tour">Tours</div>
                                <h3 class="tour-loop-product-title"><a href="#">Chill In Negril and Rick’s Café</a></h3>
                                <a class="tour-loop-button" href="#">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-tours-like">
                        <div class="inner-item-tours">
                            <div class="image-tour-item">
                                <a class="img-tour-link" href="#"><img src="{{ asset('assets/web/images/1.jpg') }}" alt=""></a>
                                <div class="tour-quick-view-cover">
                                    <!-- Button trigger modal -->
                                    <div type="button" class="tour-quick-view" data-toggle="modal"
                                        data-target="#product_view">Quick View</div>
                                </div>

                            </div>
                            <div class="tour-item-content">
                                <div class="cat-tour">Tours</div>
                                <h3 class="tour-loop-product-title"><a href="#">Chill In Negril and Rick’s Café</a></h3>
                                <a class="tour-loop-button" href="#">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-tours-like">
                        <div class="inner-item-tours">
                            <div class="image-tour-item">
                                <a class="img-tour-link" href="#"><img src="{{ asset('assets/web/images/1.jpg') }}" alt=""></a>
                                <div class="tour-quick-view-cover">
                                    <!-- Button trigger modal -->
                                    <div type="button" class="tour-quick-view" data-toggle="modal"
                                        data-target="#product_view">Quick View</div>
                                </div>

                            </div>
                            <div class="tour-item-content">
                                <div class="cat-tour">Tours</div>
                                <h3 class="tour-loop-product-title"><a href="#">Chill In Negril and Rick’s Café</a></h3>
                                <a class="tour-loop-button" href="#">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-tours-like">
                        <div class="inner-item-tours">
                            <div class="image-tour-item">
                                <a class="img-tour-link" href="#"><img src="{{ asset('assets/web/images/1.jpg') }}" alt=""></a>
                                <div class="tour-quick-view-cover">
                                    <!-- Button trigger modal -->
                                    <div type="button" class="tour-quick-view" data-toggle="modal"
                                        data-target="#product_view">Quick View</div>
                                </div>
                            </div>
                            <div class="tour-item-content">
                                <div class="cat-tour">Tours</div>
                                <h3 class="tour-loop-product-title"><a href="#">Chill In Negril and Rick’s Café</a></h3>
                                <a class="tour-loop-button" href="#">More Details</a>
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

@section('scripts')
<script>
$(document).ready(function() {
    $('select#location').select2({
        templateResult: formatOutput
    });
});
function formatOutput (item) {
    var $state = $(item.element).data('adult') + ' ' + item.text;
    return $state;
};
        // $('#location').on("change", function() {

        //     console.log($('option:selected',this).data('width'));
        //     console.log($('option:selected',this).data('height'));
        // })
    // // console.log($('option:selected',this).data('width'));
    // // console.log($('option:selected',this).data('height'));
</script>
<script>
    
            //Date Picker
            jQuery('#datepicker').datepicker({
                inline: true,
                firstDay: 1,
                minDate: 0,
                //nextText: '&rarr;',
                //prevText: '&larr;',
                showOtherMonths: true,
                //dateFormat: 'dd MM yy',
                dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                //showOn: "button",
                //buttonImage: "img/calendar-blue.png",
                //buttonImageOnly: true,
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

            //Tours Images Gallery
            jQuery('.tours-images-gallery').slick({
                dots: false,
                prevArrow: '<span class="slick-slide-arrow prev-arrow"><i class="fa fa-chevron-left" style=""></i></span>',
                nextArrow: '<span class="slick-slide-arrow next-arrow"><i class="fa fa-chevron-right" style=""></i></span>',
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
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
</script>
@endsection