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
                        <form method="POST" id="payment-form" role="form" action="{{ route('booking.transfer.save', 'transfers') }}" >
                            {{ csrf_field() }}
                            <input type="hidden" id="type" name="type" value="{{ $transfer_type->name }}"/>
                            <input type="hidden" id="type_id" name="type_id" value="{{ $transfer_type->id }}"/>
                            <input type="hidden" name="date" id="date" value="{{ date('d-m-Y') }}"/>
                            <input type="hidden" name="adult_price" id="adult_price" value=""/>
                            <input type="hidden" name="child_price" id="child_price" value="0"/>
                            <input type="hidden" name="amount" id="amount" value=""/>
                            {{-- <input type="hidden" name="pax_price" id="pax_price" value=""/> --}}
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
                            <span class="label-span">Select Destination</span>
                            <div class="select-form-input-div">
                                <select class="form-control" name="zone_id" id="zone_id"
                                    onChange="get_hotels()">
                                    <option value="">--Select Destination--</option>
                                    @foreach ($zones as $zone)
                                        @if($zone->active)
                                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>                                                           
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row-block">
                            <span class="label-span">Select Hotel</span>
                            <div class="select-form-input-div">
                                {{-- <select class="form-control" name="hotel" id="hotel"
                                    onChange="get_transfer_price()">
                                    <option value="">--Select Hotel--</option>
                                </select> --}}
                                <select class="form-control" name="hotel_id" id="hotel_id" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-row-block">
                            <div class="d-flex flex-wrap row-form-div">
                                <div class="one-half left-one-half">
                                    <span class="label-span">Number of Adults (Ages 12+)</span>
                                    <input name="adult_count" id="adults" class="input-box" type="number" value="1" min="1" step="1" max="100"
                                        id="pickup_num_adults" onChange="get_adult_transfer_price()" required="">
                                </div>
                                <div class="one-half right-one-half">
                                    <span class="label-span">Number of Children (Ages 3-11)</span>
                                    <input name="child_count" id="child" class="input-box" type="number" value="0" min="0" step="1" max="100"
                                        id="pickup_num_children" onChange="get_child_transfer_price()" required="">
                                </div>
                            </div>
                        </div>
                    {{--    <div class="form-row-block">
                            <span id="max_pax_text"><span style="color:red;">* </span>Max. number of Persons/PAX:
                                10</span>
                        </div> --}}

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
                        <img src="/images/transfer/shared_transfer/shared-transfer-main.jpeg" />
                    </div>
                    {{-- <div class="social-share-cover">
                        <div class="social-share-title">Share with friends.</div>
                        <div class="d-flex flex-wrap justify-content-center social-share-links a2a_kit a2a_kit_size_64 a2a_default_style">
                            <a class="share-link-div a2a_button_twitter"></a>
                            <a class="share-link-div a2a_button_facebook"></a>
                            <a class="share-link-div a2a_button_pinterest"></a>
                            <a class="share-link-div a2a_button_whatsapp"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                    </div> --}}
                    <div class="photo-gallery">
                        <h3 class="photo-gallery-heading">Photo Gallery</h3>
                        <div class="d-flex flex-wrap justify-content-center flex-logos row-photo-gallery">
                            <div class="gallery-block">
                                <a href="/images/transfer/shared_transfer/shared-transfer-main.jpeg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="/images/transfer/shared_transfer/shared-transfer-main.jpeg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="/images/transfer/shared_transfer/shared-transfer-1.jpeg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="/images/transfer/shared_transfer/shared-transfer-1.jpeg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="/images/transfer/shared_transfer/shared-transfer-2.jpeg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="/images/transfer/shared_transfer/shared-transfer-2.jpeg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="/images/transfer/shared_transfer/shared-transfer-3.jpeg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="/images/transfer/shared_transfer/shared-transfer-3.jpeg"></a>
                            </div>
                            <div class="gallery-block">
                                <a href="/images/transfer/shared_transfer/shared-transfer-4.jpeg"
                                    data-lightbox="photos"><img class="img-fluid"
                                        src="/images/transfer/shared_transfer/shared-transfer-4.jpeg"></a>
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
    // jQuery(document).ready(function() { calculate_price(); });
    
    // $( "#datepicker1" ).datepicker({ minDate: 0});
    // jQuery('#datepicker1').datepicker({  minDate:new Date()});
    
    //Date Picker
    jQuery('#datepicker1').datepicker({
        dateFormat: 'dd-mm-yy',
        defaultDate: "+1d",
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

    function total_price(){
        var adult_price = jQuery('#adult_price').val();
        var child_price = jQuery('#child_price').val();
        if(adult_price === ''){
            adult_price = 0;
        }
        if(child_price === ''){
            child_price = 0;
        }
        var amount = Number(adult_price) + Number(child_price);
        if(amount > 0){
            jQuery('.single_add_to_cart_button').removeClass('disabled');
            jQuery('.single_add_to_cart_button').removeAttr('disabled');;
        }
        jQuery('#transfer_price').html(Math.round(amount)+'.00');
        jQuery('#amount').val(Math.round(amount));
    }

    function calculate_price(){
        var adult_price = jQuery('#adult_price').val();
        var child_price = jQuery('#child_price').val();
        var amount = Number(adult_price) + Number(child_price);
        if(adult_price === ''){
            // alert('price is null');
            get_adult_transfer_price().delay( 500 );
        }
        // if(child_price === ''){
        //     // alert('price is null');
        //     get_adult_transfer_price().delay( 500 );
        // }
    }

    function get_hotels() {
        var zone_id = jQuery("#zone_id").val();
        var type = jQuery('#type').val();
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('get_hotels') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "zone_id": zone_id,
            },
            dataType: 'JSON',
            success: function (data) {
                get_adult_transfer_price();
                $('#hotel_id').html('<option value="">--Select Hotels--</option>'); 
                $.each(data.hotels,function(key,value){
                    $("#hotel_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    }
    
    function get_adult_transfer_price() {
        jQuery('.single_add_to_cart_button').attr('disabled','disabled');
        jQuery('.single_add_to_cart_button').addClass('disabled');;
        var person = jQuery('#adults').val();
        var zone_id = jQuery("#zone_id").val();
        var type_id = jQuery("#type_id").val();
        if(zone_id === ''){
            alert("Please select destination.");
            jQuery("#zone_id").focus();
            return;
        }
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('get_private_price') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "zone_id": zone_id,
                "person": person,
                "type_id": type_id
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.price != 0){
                    jQuery('#adult_price').val(data.price*person);
                } else {
                    alert('No transfer available for such persons');
                    jQuery('#adults').val(1);
                    jQuery('.single_add_to_cart_button').attr('disabled','disabled');
                    jQuery('.single_add_to_cart_button').addClass('disabled');
                    jQuery('#adult_price').val(data.price);
                    jQuery('#adult_price').val(0);
                    // get_adult_transfer_price();
                    // jQuery('#transfer_price').html('0.00');
                    // jQuery('#amount').val(0);
                }
                // jQuery('#adult_price').val(data.price);
                // console.log(data.price);
                total_price();
            }
        });
    }
    
    function get_child_transfer_price() {
        jQuery('.single_add_to_cart_button').attr('disabled','disabled');
        jQuery('.single_add_to_cart_button').addClass('disabled');;
        var person = jQuery('#child').val();
        if(person === '0'){
            console.log('price is 0');
            jQuery('#child_price').val(0);
            total_price();
            return;
        }
        var zone_id = jQuery("#zone_id").val();
        var type_id = jQuery("#type_id").val();
        if(zone_id === ''){
            alert("Please select destination.");
            jQuery("#zone_id").focus();
            return;
        }
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('get_private_price') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "zone_id": zone_id,
                "person": person,
                "type_id": type_id
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.price != 0){
                    var childPrice = Math.round(data.price/2);
                    jQuery('#child_price').val(childPrice*person);
                } else {
                    alert('No transfer available for such persons');
                    jQuery('#child').val(0);
                    jQuery('.single_add_to_cart_button').attr('disabled','disabled');
                    jQuery('.single_add_to_cart_button').addClass('disabled');
                    jQuery('#transfer_price').html('0.00');
                    jQuery('#amount').val(0);
                }
                // console.log(data.price);
                total_price();
            }
        });
    }
</script>
@endsection