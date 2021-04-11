@extends('layouts/web/web')

@section('title', '| Register You Jet Ski')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/web/css/image-uploader.min.css') }}">
@endsection

@section('content')
<section class="listiner-banner">
 <div class="container">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <h1>Tell us a little about your Jet Ski</h1>
      <p>This information will help us identify the rest of your Jet Ski details, which you can review later.</p>
    </div>
  </div>
</div>
</section>

<div class="container">
  <div class="row _1W2S4 mt-4">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1 class="">Ahoy there Captain!</h1>
      <p>Your jet ski will soon be visible to the largest community of sailors interested in peer-to-peer jet ski charters. Welcome to Ski Ski!</p>
    </div>
  </div>
  <div class="row _1W2S4 register-jet-row mb-5">
   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
     <form action="" method="post" enctype="multipart/form-data">
     @csrf
      <h4>Your Jetski</h4>
      <hr>
      <div class="row register-jet-form mb-4">
        <div class="elem-group inlined">
          <label for="checkin-date">Add a title for your Jet Ski</label>
          <input type="text" id="title" name="title" required="">
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Passenger capacity</label>
          <input type="text" id="capacity" name="capacity" required="">
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Price</label>
          <input type="text" id="price" name="price" required="">
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Price is per</label>
          <select name="price_unit" id="price_unit" require>
           <option value="hour">Hour</option>
           <option value="day">Day</option>
         </select>
       </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Year of Making</label>
          <select name="year" id="year" require>
            @for($i = date('Y') ; $i >= date('Y')-20; $i--){
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Captain Included</label>
          <select name="captain" id="captain" require>
           <option value="1">Yes</option>
           <option value="0">No</option>
         </select>
       </div>
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Make</label>
          <select name="make" id="make" require>
           <option value="" selected>--Select Make--</option>
           @foreach( App\Make::get() as $make )
           <option value="{{ $make->id }}">{{ $make->name }}</option>
           @endforeach
         </select>
       </div>
       <div class="elem-group inlined">
        <label for="checkin-date">Model</label>
        <select name="model" id="model" require>
        </select>
      </div>
      <hr>
    </div>

    <div class="row register-jet-form mb-4">
      <h4 class="">What type of insurance do you have?</h4>
      <p>You must have existing insurance in order for your Jet Ski to be approved. 
      This can be recreational Jet Ski insurance or commercial charter operator insurance.</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="insurance" id="personal" value="I have recreational Jet Ski insurance">
        <label class="form-check-label" for="personal">
         I have recreational Jet Ski insurance
         <p>Select this if you own a personal Jet Ski.</p>
       </label>
     </div>
     <div class="form-check">
      <input class="form-check-input" type="radio" name="insurance" id="commercial" checked="" value="I have commercial charter insurance">
      <label class="form-check-label" for="commercial">
        I have commercial charter insurance
        <p>Select this if you run a Jet Ski rental or charter business.</p>
      </label>
    </div>
    <hr>
  </div>
  
  <div class="row register-jet-form mb-4">
    <h4 class="">Where is your Jet Ski?</h4>
    <p>To protect your privacy, we only show your Jet Ski’s exact location to guests once you’ve confirmed their trip.</p>
    <div class="elem-group inlined">
      <label for="checkin-date">Location</label>
      <input type="text" id="address" name="address" role="combobox" aria-labelledby="label_search_location"
                                           aria-expanded="true" aria-autocomplete="list" aria-owns="explore-location-suggest" 
                                           placeholder="Please type a location..." required="">
      <input type="hidden" id="route" name="street" required="">
      <input type="hidden" id="locality" name="city" required="">
      <input type="hidden" id="administrative_area_level_1" name="state" required="">
      <input type="hidden" id="country" name="country" required="">
      <input type="hidden" id="lat" name="lat" required="">
      <input type="hidden" id="long" name="long" required="">
   </div>
   <hr>
 </div>
 
 <div class="row register-jet-form mb-4">
  <h4 class="">Your jet ski listing</h4>
  <p>This is what renters will see when looking for Jet Ski in your area. You can always edit this later.</p>
  <!-- <div class="elem-group inlined">
    <label for="checkin-date">Listing Title</label>
    <input type="text" id="" name="address" required="">
  </div> -->
  <div class="elem-group inlined">
    <label for="checkin-date">Description</label>
    <textarea name="description"></textarea>
  </div>
  <hr>
</div>
<div class="row register-jet-form mb-4">
  <h4 class="">Cancellation policy</h4>
  <p>Select how you want to handle trip cancellations. </p>
  @foreach($cancel_policies as $policy)
  <div class="form-check">
    <input class="form-check-input" type="radio" name="cancel_policy" id="{{$policy->name}}" value="{{$policy->id}}">
    <label class="form-check-label" for="{{$policy->name}}">
     {{$policy->name}}
     {!! $policy->description !!}
   </label>
 </div>
 @endforeach
<hr>
</div>
<div class="row register-jet-form mb-4">
  <h4 class="">Jet Ski photos</h4>
  <p>It’s important for renters to see your Jet Ski before they request it.</p>
    <div class="input-images" style="width: 100%"></div>
  <hr>
</div>
<button type="submit" class="btn btn-primary py-3 px-5">Save Details</button>
</form></div>
</div>



</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/web/js/image-uploader.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWwDUV3bzFpJxhojq9JFaUCg2DX7da9rU&libraries=places"></script>
<script>
$(document).ready(function() { 

  var input = document.getElementById('address');
  var autocomplete = new google.maps.places.Autocomplete(input);

  const componentForm = {
    // street_number: "long_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "long_name",
    country: "long_name",
    // postal_code: "short_name",
  };

  google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        console.log(place);

        for (const component in componentForm) {
          document.getElementById(component).value = "";
          document.getElementById(component).disabled = false;
        }

        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('long').value = place.geometry.location.lng();


        for (const component of place.address_components) {
          const addressType = component.types[0];

          if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
        // alert(place.geometry.location.lat());
        // alert(place.geometry.location.lng());
    });

});
</script>
<script>
$('.input-images').imageUploader();

  $(function(){
    $('#make').change(function(){
     $("#model option").remove();
     var id = $(this).val();
     if(id == ""){
       return false;
     }
     $.ajax({
      url : '{{ route( 'loadModels' ) }}',
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id
      },
      type: 'post',
      dataType: 'json',
      success: function( result )
      {
       $.each( result, function(k, v) {
        $('#model').append($('<option>', {value:k, text:v}));
      });
     },
     error: function()
     {
             //handle errors
             console.log('error...');
           }
         });
   });
  });
</script>
@endsection