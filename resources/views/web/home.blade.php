@extends('layouts/web/web')

@section('title', '| Welcome to SkiSki')

@section('styles')
	<style>
		.pac-container:after {
			/* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
			content:none !important;
			background-image: none !important;
			height: 0px;
		}
	</style>
@endsection
@section('content')
	<div class="container text-center">
		<h1>Amaze | We Deliver</h1>
	</div>
@endsection

@section('scripts')
	@if(Request::is('/') || Request::is('/home'))
		<script src="{{ asset('assets/web/js/image-uploader.min.js') }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaD7l4cML2F5NShPqSlkSzTDKQ4NF6ORQ&libraries=places"></script>
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
	@endif
@endsection