@extends('layouts.web.master')

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <div class="container">
        <div class="airport-transfers-cover">
            <div class="d-flex flex-wrap row-airport-transfers">
                <div class="left-airport-transfers">
                    <div class="breadcrumb-block breadcrumb-airport-transfers">
                        <nav class="d-flex flex-wrap justify-content-center nav-breadcrumb">
                            <a href="{{ route('home') }}">Home</a>&nbsp;/&nbsp;<a href="{{ route('transfers') }}">Transfers</a>&nbsp;/&nbsp;Shared Transfers</nav>
                    </div>
                    <div class="title-transfers-airport">
                        <h1 class="title-airport">Shared Transfers</h1>
                    </div>
                    <div class="busimg-block-title" style="display:none;">
                        <img src="images/bus-img.png" />
                    </div>
                    <div class="transfers-content-expert">
                        <p>Let’s arrange your MBJ airport transfer in advance to & from your hotel destination in
                            comfort. Our shuttle transfer service takes you from Sangsters International Airport in Montego
                            Bay (MBJ) to your hotel, and back without any hassle for your departure.</p>
                    </div>
                    <hr class="divider-separator" />
                    <div id="transfers-book-instantly" class="transfers-book-instantly">
                        <a class="saltella booking-form-airport-button transfers-book-instantly-button" href="#">Book
                            Instantly!</a>
                    </div>
                    <div class="transfers-book-instantly-fixed" style="display:none;">
                        <a class="booking-form-airport-button transfers-instantly-button-fixed" href="#">Book
                            Transfer</a>
                    </div>
                    <div id="book-airport-transfers-form" class="book-airport-transfers-form">
                        <h3 class="airport-transfers-form-title">Book Your Transfer Below</h3>
                        <div class="form-airport-transfers-booking-block">
                        <form method="POST" id="payment-form" role="form" action="{{ route('booking.save', 'transfers') }}" >
                        {{ csrf_field() }}
                            <input type="hidden" id="type" name="type" value="shared"/>
                            <input type="hidden" name="date" id="date" value="{{ date('d-m-Y') }}"/>
                            <input type="hidden" name="adult_rate" id="adult_rate" value=""/>
                            <input type="hidden" name="child_rate" id="child_rate" value=""/>
                            <input type="hidden" name="amount" id="amount" value=""/>
                            <input type="hidden" name="pax_price" id="pax_price" value=""/>
                            <div class="wc-bookings-booking-form">
                                <div
                                    class="wc-bookings-date-picker wc-bookings-date-picker-booking wc_bookings_field_start_date">
                                    <div id="datepicker1"></div>
                                </div>
                                <div class="wc-bookings-booking-cost"><strong>This booking date is
                                        available!</strong></div>
                            </div>
                        </div>
                        <div class="form-row-block">
                            {{-- <div class="d-flex flex-wrap row-form-div"> --}}
                                {{-- <div class="one-half left-one-half">
                                    <span class="label-span">Transfer Type</span>
                                    <div class="select-form-input-div">
                                        <select class="form-control" name="type" id="type" onChange="calculate_price()">
                                            <option value="shared">Shared</option>
                                            <option value="private">Private</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class=""> --}}
                                    <span class="label-span">One-way/Round Trip</span>
                                    <div class="select-form-input-div">
                                        <select class="form-control" name="trip_type" id="trip_type" onChange="calculate_price()">
                                            <option value="round-trip">Round Trip</option>
                                            <option value="one-way-to-mbj">One-Way to MBJ Airport</option>
                                            <option value="one-way-fr-mbj">One-Way from MBJ Airport</option>
                                        </select>
                                    </div>
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                        <div class="form-row-block">
                            <span class="label-span">One-way/Round Trip</span>
                            <div class="select-form-input-div">
                                <select class="form-control" name="location_id" id="location" onChange="get_transfer_price()">
                                    {{-- <option value="">--select location--</option> --}}
                                    @foreach ($locations as $location)
                                        @if($location->active)
                                            <option value="{{ $location->id }}">{{ $location->name }} | {{ $location->city }}</option>                                                           
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row-block">
                            <div class="d-flex flex-wrap row-form-div">
                                <div class="one-half left-one-half">
                                    <span class="label-span">Number of Adults (Ages 12+)</span>
                                    <input name="adult_count" id="adults" class="input-box" type="number" value="1" min="1" step="1" max="100"
                                        id="pickup_num_adults" onChange="calculate_price()" required="">
                                </div>
                                <div class="one-half right-one-half">
                                    <span class="label-span">Number of Children (Ages 3-11)</span>
                                    <input name="child_count" id="child" class="input-box" type="number" value="0" min="0" step="1" max="100"
                                        id="pickup_num_children" onChange="calculate_price()" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-block">
                            <span id="max_pax_text"><span style="color:red;">* </span>Max. number of Persons/PAX:
                                10</span>
                        </div>

                        <div class="form-row-block">
                            <span class="label-span">Additional Transfer Information</span>
                            <textarea class="textarea-box" rows="4" maxlength="500"
                                id="adtl_pickup_info_input" name="pickup_info"></textarea>
                        </div>
                        <div class="tour_total_pricing">
                            <h4 class="price_title">Transfer Pricing</h4>
                            <h4 class="price">$<span id="transfer_price">0.00</span></h4>
                        </div>
                        <div class="submit-button-cover"><button type="submit"
                                class="form-tour-booking-button single_add_to_cart_button button disabled" style="" disabled>Book
                                now</button></div>
                        </form>
                    </div>
                </div>
                <div class="right-airport-transfers">
                    <div class="busimg-block">
                        <img src="{{ asset('assets/web/images/bus-img.png') }}" />
                    </div>
                    <div class="social-share-cover">
                        <div class="social-share-title">Share with friends.</div>
                        {{-- <div class="d-flex flex-wrap justify-content-center social-share-links">
                            <div class="share-link-div"><a href="#" class="share-link twitter-share"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></a></div>
                            <div class="share-link-div"><a href="#" class="share-link facebook-share"><i
                                        class="fab fa-facebook" aria-hidden="true"></i></a></div>
                            <div class="share-link-div"><a href="#" class="share-link whatsapp-share"><i
                                        class="fab fa-whatsapp" aria-hidden="true"></i></a></div>
                        </div> --}}
                        <!-- AddToAny BEGIN -->
                        <div class="d-flex flex-wrap justify-content-center social-share-links a2a_kit a2a_kit_size_64 a2a_default_style">
                            <a class="share-link-div a2a_button_twitter"></a>
                            <a class="share-link-div a2a_button_facebook"></a>
                            <a class="share-link-div a2a_button_pinterest"></a>
                            <a class="share-link-div a2a_button_whatsapp"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                    <div class="photo-gallery">
                        <h3 class="photo-gallery-heading">Photo Gallery</h3>
                        <div class="d-flex flex-wrap justify-content-center flex-logos row-photo-gallery">
                            <div class="gallery-block">
                                <a href="http://localhost:8000/images/tour/1633117262.2312.jpg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="http://localhost:8000/images/tour/1633117262.2312.jpg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="http://localhost:8000/images/tour/1633117262.5045.jpg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="http://localhost:8000/images/tour/1633117262.5045.jpg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="http://localhost:8000/images/tour/1633117262.7777.jpg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="http://localhost:8000/images/tour/1633117262.7777.jpg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="http://localhost:8000/images/tour/1633117263.0619.jpg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="http://localhost:8000/images/tour/1633117263.0619.jpg"></a>
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
    jQuery(document).ready(function() { calculate_price(); });
    
    // $( "#datepicker1" ).datepicker({ minDate: 0});
    // jQuery('#datepicker1').datepicker({  minDate:new Date()});
    
            //Date Picker
            jQuery('#datepicker1').datepicker({
                dateFormat: 'dd-mm-yy',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                minDate:new Date(), // <-------- this will disable all dates prior to the date passed there.
                onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                },
                inline: true,
                firstDay: 1,
                //nextText: '&rarr;',
                //prevText: '&larr;',
                showOtherMonths: true,
                //dateFormat: 'dd MM yy',
                dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                onSelect: function(dateText) {
                    jQuery('#date').val(dateText);
                    console.log("Selected date: " + dateText + "; input's current value: " + this.value);
                }
                //showOn: "button",
                //buttonImage: "img/calendar-blue.png",
                //buttonImageOnly: true,
            });

    function calculate_price(){
        // var type = jQuery('#type').val();
        var type = "shared";
        if(jQuery("#location").val() ===''){
            // alert('Please select an location');
            get_transfer_price();
            return;
        }
        var adult = jQuery('#adults').val();
        var child = jQuery('#child').val();
        var total_pax = Number(adult) + Number(child);
        if(total_pax > 10){
            alert('Cannot add more than 10 persons');
            var adult = jQuery('#adults').val(1);
            var child = jQuery('#child').val(0);
            total_pax = 1;
        }
        var trip_type = jQuery('#trip_type').val();
        if(type==="shared"){
            var price = jQuery('#pax_price').val();
            if(price === ''){
                // alert('price is null');
                get_transfer_price();
            }
            if(trip_type === "round-trip"){
                jQuery('#adult_rate').val(price*2);
                jQuery('#child_rate').val(price*2);
                price = price * 2;
            }else{
                jQuery('#adult_rate').val(price);
                jQuery('#child_rate').val(price);
            }
            // console.log('total pax '+total_pax);
            // console.log('pax price '+price);
            var total_price = total_pax * price;
            if(total_price > 0){
                jQuery('.single_add_to_cart_button').removeClass('disabled');
                jQuery('.single_add_to_cart_button').removeAttr('disabled');;
            }
            jQuery('#transfer_price').html(total_price+'.00');
            jQuery('#amount').val(total_price);
        }
    }

    
    // jQuery(document).ready(function() {
        // jQuery("#location").change(function () {
        function get_transfer_price() {
            // var location_id = this.value;
            var location_id = jQuery("#location").val();
            var type = jQuery('#type').val();
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('get_airTransferPrice') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "location_id": location_id,
                    "type": type
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.success === true){
                        if(type === "shared") {
                            // console.log(data.option.price_pax);
                            jQuery('#pax_price').val(data.option.price_pax);
                            calculate_price();
                            return;
                        } else {
                            return;
                        }
                    } else {
                        return;
                    }
                }
            });
        // });
        }
    // });

</script>
@endsection