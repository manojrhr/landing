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
          <label for="checkin-date">Year</label>
          <select name="year" id="year" require>
            @for($i = date('Y') ; $i >= date('Y')-20; $i--){
            <option>{{$i}}</option>
            @endfor
          </select>
        </div>
        <div class="elem-group inlined">
          <label for="checkin-date">Make</label>
          <select name="make" id="make" require>
           <option value="" selected>--Select Model--</option>
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
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
         I have recreational Jet Ski insurance
         <p>Select this if you own a personal Jet Ski.</p>
       </label>
     </div>
     <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
      <label class="form-check-label" for="flexRadioDefault2">
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
      <label for="checkin-date">Location Type</label>
      <select>
       <option>Marina slip</option>
       <option>Marina dry storage</option>
       <option>Marina rack srorage</option>
       <option>Marina mooring</option>
       <option>Residence trailer</option>
       <option>Residence slip</option>
       <option>Residence mooring</option>
       <option>Storage facility</option>
     </select>
   </div>
   <hr>
 </div>
 
 <div class="row register-jet-form mb-4">
  <h4 class="">Your jet ski listing</h4>
  <p>This is what renters will see when looking for Jet Ski in your area. You can always edit this later.</p>
  <div class="elem-group inlined">
    <label for="checkin-date">Listing Title</label>
    <input type="text" id="" name="address" required="">
  </div>
  <div class="elem-group inlined">
    <label for="checkin-date">Description</label>
    <textarea></textarea>
  </div>
  <hr>
</div>
<div class="row register-jet-form mb-4">
  <h4 class="">Cancellation policy</h4>
  <p>Select how you want to handle trip cancellations. </p>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="cancel_policy" id="flexible">
    <label class="form-check-label" for="flexible">
     Flexible
     <p>100% payout for cancellations made within 24 hours of the booking start time.</p>
   </label>
 </div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="cancel_policy" id="moderate" checked="">
  <label class="form-check-label" for="moderate">
    Moderate
    <p>100% payout for cancellations made within 2 days of the booking start time.</p>
    <p>50% payout for cancellations made between 2-5 days of the booking start time.</p>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="cancel_policy" id="strict" checked="">
  <label class="form-check-label" for="strict">
    Strict
    <p>100% payout for cancellations made within 14 days of the booking start time.</p>
    <p>50% payout for cancellations made between 14-30 days of the booking start time.</p>
  </label>
</div>
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