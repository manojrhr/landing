@extends('layouts.web.master')

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <div class="container">
        <div class="airport-transfers-cover">
            <div class="d-flex flex-wrap row-airport-transfers">
                <div class="luxury-transfers">
                    <div class="row flex-wrap row-tour-item">
                        <div class="col-md-6 tour-item">
                            <div class="tour-inner-item">
                                <div class="tour-item-img"><a class="stretched-link"
                                        href="{{ route('transfers.type','delux') }}"><img
                                            src="/images/tour/delux-main.jpg" /></a></div>
                                <div class="tour-item-content">
                                    <h4>Delux Transfer</h4>
                                    <div class="tour-text-editor"></div>
                                    <div class="tour-more-button"><a class="stretched-link more-details-btn"
                                            href="{{ route('transfers.type','delux') }}">Book Now<i
                                                class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 tour-item">
                            <div class="tour-inner-item">
                                <div class="tour-item-img"><a class="stretched-link"
                                        href="{{ route('transfers.type','suburban') }}"><img
                                            src="/images/tour/suberban-main.jpg" /></a></div>
                                <div class="tour-item-content">
                                    <h4>Suburban Transfer</h4>
                                    <div class="tour-text-editor"></div>
                                    <div class="tour-more-button"><a class="stretched-link more-details-btn"
                                            href="{{ route('transfers.type','suburban') }}">Book Now<i
                                                class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
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
<style>
@media (max-width:767px) {
    .tour-item-img img {
    width: 100%;
    padding-bottom: 50px;
}}
</style>
@endsection