@extends('layouts/web/web')

@section('content')

@if(empty($playerlist))
  <div class="searchResultsGrid">
    <div class="text-center" style="margin: 30px">
      <h1>Sorry! our services are not available on your location.</h1>
    </div>
  </div>
@endif
<div class="searchResultsGrid">
@php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
foreach ($rows as $jet){
  if($rowCount % $numOfCols == 0) { 
@endphp
  <div class="row mb-5">
@php
    }
    $rowCount++; 
@endphp
<div class="col-lg-4">
  <div class="searchResult-gridItem">
    <a href="{{ route('jetski_detail',$jet->slug) }}">
      <div class="searchResult-gridItem-img">
        <img src="{{ asset($jet->image) }}">
      </div>
      <div class="wmlurb-StyledText">
        <div class="wmlurb-StyledText-VehicleLabelText">
          {{ $jet->title }}
        </div>
        <div class="VehicleCardStarsAndTripsTakenContainer">
          <div class="TripsTaken-review">
           4.1
         </div>
         <div class="TripsTaken-star">
           <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iY29sb3IiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDI0IDI0IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0yMy4zNjMgOC41ODQtNy4zNzgtMS4xMjctMy4zMDctNy4wNDRjLS4yNDctLjUyNi0xLjExLS41MjYtMS4zNTcgMGwtMy4zMDYgNy4wNDQtNy4zNzggMS4xMjdjLS42MDYuMDkzLS44NDguODMtLjQyMyAxLjI2NWw1LjM2IDUuNDk0LTEuMjY3IDcuNzY3Yy0uMTAxLjYxNy41NTggMS4wOCAxLjEwMy43NzdsNi41OS0zLjY0MiA2LjU5IDMuNjQzYy41NC4zIDEuMjA1LS4xNTQgMS4xMDMtLjc3N2wtMS4yNjctNy43NjcgNS4zNi01LjQ5NGMuNDI1LS40MzYuMTgyLTEuMTczLS40MjMtMS4yNjZ6IiBmaWxsPSIjZmZjMTA3Ii8+PC9zdmc+" />
         </div>
       </div>
       <div class="css-12t3p8o-PriceDetailsContainer-PriceDetailsContainer e1lvazuk4">
        <div data-testid="vehicle-discount-and-daily-price" class="css-5mc9r1-DiscountAndDailyPriceContainer-DiscountAndDailyPriceContainer e1lvazuk3">
          <div class="css-1mgmnh6-StyledDiscountContainer-StyledDiscountContainer e1lvazuk2">
            <div class="css-1uiu9md-StyledIconContainer-StyledIcon e1lvazuk1">
              <svg class="css-nhz5i0-Icon" data-test="Tag-24" height="12px" viewBox="0 0 24 24" width="12px">
                <use height="24" href="#Tag-24" role="img" width="24"></use>
              </svg>
            </div>
            <!-- <p class="css-11g3qv-StyledText">Book now, save $39</p> -->
          </div>
          <div>
            <span class="e1vzbonb0 css-zph09g-StyledText-BasePrice-BasePrice">$53</span>
            <span class="css-g36krj-StyledText">{{ $jet->price }}/day</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
</div>
@php
    if($rowCount % $numOfCols == 0) { 
@endphp
 </div> 
@php 
} 
} 
@endphp
</div>
</div>


@endsection
