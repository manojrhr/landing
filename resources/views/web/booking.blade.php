@extends('layouts/web/web')

@section('styles')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1 class="text-center pt-5 pb-5">Send a Booking Inquiry</h1>
    </div>
  </div>
  <div class="row _1W2S4">
   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
     <form action="" method="post">
       @csrf
      <div class="row duration-row booking-requst-row mb-5">
       <h4>Duration</h4>
       <p>How long do you want your trip or rental to be?</p>
       @if($jetski->price_unit == 'hour')
       <div class="elem-group inlined">
        <label for="hours">Hours</label>
        <input type="number" id="hours" name="hours" value="{{ old('hours', 1) }}" onChange="changePrice(this.value);" placeholder="1" min="1" max="23" required>
      </div>
      @endif
      <!-- <div class="elem-group inlined">
        <label for="minutes">Minutes</label>
        <input type="number" id="minutes" name="minutes" value="{{ old('minutes', 0) }}" placeholder="0" min="0" max="59">
      </div> -->
       @if($jetski->price_unit == 'day')
      <div class="elem-group inlined">
       <label for="nights">Days</label>
       <input type="number" id="nights" name="nights" value="{{ old('nights', 1) }}" onChange="changePrice(this.value);" placeholder="0" min="1" max="100" required>
     </div>
      @endif
   </div>
   <hr>
   <div class="row preferred-dates-row booking-requst-row mb-5">
       <h4>Preferred Dates</h4>
       <p>Please provide at least one date preference. Return on same-day</p>
       <div class="elem-group inlined">
           <label for="checkin-date">Duration:</label>
           <input type="date" id="checkin-date" name="checkin_date" value="{{ old('checkin_date') }}" required>
        </div>
    </div>
<hr>
<div class="row preferred-dates-row booking-requst-row mb-5">
  <h4>Other Options</h4>
  <p>Provide additional dates if your dates are flexible and you have other possible options.</p>
  <div class="elem-group inlined">
    <label for="checkin-date">Duration:</label>
    <input type="date" id="flex-start-date" name="flex_start_date" value="{{ old('flex_start_date') }}">
  </div>
  <div class="elem-group inlined">
    <label for="checkin-date">Duration:</label>
    <input type="date" id="flex-end-date" name="flex_end_date" value="{{ old('flex_end_date') }}">
  </div>
</div>
<hr>
<hr>
<div class="row preferred-dates-row booking-requst-row mb-5">
  <h4>Pickup Time</h4>
  <p>What time would you like to arrive? You can skip this step if you prefer the owner to suggest a time.</p>
  <div class="elem-group inlined">
    <!-- <label for="checkin-date">Duration:</label> -->
    <!-- <input type="date" id="checkin-date" name="checkin" required> -->
    <!-- <div class="SAYPH "> -->
        <!-- <label for="pickup_time" class="_3iZEi">
            <svg class="_2iHsn"><use xlink:href="#icon-time"></use></svg>
        </label> -->
        <input title="" id="pickup_time" placeholder="--:-- --" maxlength="8" size="8" class="_31Grl " name="pickup_time" type="time" value="{{ old('pickup_time', '09:00') }}">
    <!-- </div> -->
  </div>
</div>
<hr>
<div class="row Group-size-row booking-requst-row mb-5">
 <h4>Group Size</h4>
 <div class="elem-group inlined">
  <label for="adult">Adults</label>
  <input type="number" id="adult" min="1" max="100" name="adult" value="{{ old('adult', 1) }}" placeholder="1" min="1" required>
</div>
<div class="elem-group inlined">
  <label for="senior">Seniors</label>
  <input type="number" id="senior" min="0" max="100" name="senior" value="{{ old('senior', 0) }}" placeholder="0" min="0">
</div>
<div class="elem-group inlined">
  <label for="child">Children</label>
  <input type="number" id="child" min="0" max="100" name="child" value="{{ old('child', 0) }}" placeholder="0" min="0">
</div>
<!-- <div class="elem-group inlined">
  <label for="infants">Infants</label>
  <input type="number" id="infants" min="0" max="100" name="infants" value="{{ old('infants', 0) }}" placeholder="0" min="0">
</div> -->
</div>
<hr>
<div class="row Anything-size-row booking-requst-row mb-5">
  <h4>Anything Else?</h4>
  <p>Do you have any specific needs or requests that the owner needs to know?</p>
  <div class="elem-group">
   <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required>{{ old('visitor_message') }}</textarea>
 </div>
</div>
<div><h4>Your Total Amount is: <span id='total'>{{'$'.$jetski->price}}</span></h4></div>
<input type="hidden" name="total_amount" id="total_amount" value="{{$jetski->price}}">
<button type="submit" class="btn-primary" id="submit-btn">Pay and Book Jet Ski</button>
</form>
</div>
</div>	

@endsection

@section('scripts')
<script type="text/javascript">
  function changePrice(val) {
    var value = val;
    var price = {{$jetski->price}};
    var total = value*price;
    $('span#total').text('$'+total);
    $('#total_amount').val(total);
    if(total == 0){
      $('#submit-btn').prop('disabled', true);
    }
  }
</script>
@endsection