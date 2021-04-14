@extends('layouts/web/web')

@section('title', '| Welcome to SkiSki')

@section('content')

		<div class="SearchHome">
			<div class="Container--xl">
			<div class="">
		    <form autocomplete="off">
		    	<div class="Grid">
		    	<div class="Grid-cell">
		        <div class="SearchHome-content">
		        	<div class="SearchForm-prefix">
						<span class="icon-room ml-1"></span>
						</div>
		            <div class="u-flex u-flexJustifyCenter u-flexAlignItemsCenter">
		            	<div class="SearchForm-inputLocationWrapper">
						<!-- <input class="SearchForm-inputLocation" type="text" name="Location" placeholder="Location"> -->
						<input  class="SearchForm-inputLocation"type="text" id="address" name="Location" role="combobox"
											aria-labelledby="label_search_location"
											aria-expanded="true" aria-autocomplete="list" aria-owns="explore-location-suggest" 
											placeholder="Search for a destination..." required="">
						<input type="hidden" id="route" name="street" required="">
						<input type="hidden" id="locality" name="city" required="">
						<input type="hidden" id="administrative_area_level_1" name="state" required="">
						<input type="hidden" id="country" name="country" required="">
						<input type="hidden" id="lat" name="lat" required="">
						<input type="hidden" id="long" name="long" required="">
		         	</div>
		            <div class="SearchForm-submit"> <button type="submit" class="btn SearchForm-inputsearch">Search</button>
		            </div>
		        </div>
		    </div>
		      </div>
		    </div>
		    </form>
		</div>
		</div>
		</div>
		<div class="hero-slide owl-carousel site-blocks-cover">
			<!-- div class="intro-section" style="background-image: url('/assets/web/images/hero_1.jpg');"> -->
			<div class="intro-section" style="background-image: url('{{ asset('assets/web/images/hero_1.jpg')}}');">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12 text-center" data-aos="fade-up">
							<h1>Explore, Discover The Ocean</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, in distinctio nostrum laborum sed quisquam voluptate facilis non.</p>
						
						</div>
					</div>
				</div>
			</div>
			<div class="intro-section" style="background-image: url('{{ asset('assets/web/images/hero_2.jpg')}}');">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12 text-center" data-aos="fade-up">
							<h1>Enjoy The Ocean With Your Family</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, in distinctio nostrum laborum sed quisquam voluptate facilis non.</p>
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('assets/web/images/jet_3.jpg') }}" alt="Image" class="img-fluid">
					</div>
					<div class="col-md-6">
						<span class="text-serif text-primary">About Us</span>
						<h3 class="heading-92913 text-black">Welcome To SkiSki</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, illum, quasi. Odit velit deserunt eligendi unde, enim. Enim fugiat.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eius ullam impedit architecto debitis facilis!</p>
						<p><a href="{{ route('listing') }}" class="btn btn-primary py-3 px-4">Explore Jet Skies</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="service-29283">
							<span class="wrap-icon-39293">
								<span class="flaticon-yacht"></span>
							</span>
							<h3>High Speed Ski Jet</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsa, ad ratione quos distinctio unde.</p>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="service-29283">
							<span class="wrap-icon-39293">
								<span class="flaticon-shield"></span>
							</span>
							<h3>30 Years of Experience</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsa, ad ratione quos distinctio unde.</p>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="service-29283">
							<span class="wrap-icon-39293">
								<span class="flaticon-captain"></span>
							</span>
							<h3>Good Captain</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsa, ad ratione quos distinctio unde.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-section bg-image overlay" style="background-image: url('/assets/web/images/hero_1.jpg');">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="counter-39392">
							<h3>349</h3>
							<span>Number of Ski Jet</span>
						</div>
					</div>
					<div class="col">
						<div class="counter-39392">
							<h3>7000+</h3>
							<span>Customers Satisfied</span>
						</div>
					</div>
					<div class="col">
						<div class="counter-39392">
							<h3>120</h3>
							<span>Number of Staffs</span>
						</div>
					</div>
					<div class="col">
						<div class="counter-39392">
							<h3>493</h3>
							<span>Sea Destinations</span>
						</div>
					</div>
					<div class="col">
						<div class="counter-39392">
							<h3>230</h3>
							<span>Professional Sailors</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5">
					<div class="col-md-7 text-center">
						<span class="text-serif text-primary">Destination</span>
						<h3 class="heading-92913 text-black text-center">Our Destinations</h3>
					</div>
				</div>
				<div class="row">
					@foreach($jetskies as $jetski)
					<div class="col-md-6 col-lg-4 mb-4">
						<div class="service-39381">
							<a href="{{ route('jetski_detail',$jetski->slug) }}">
								<img src=" {{ asset($jetski->image) }}" alt="Image" class="img-fluid">
								<div class="p-4">
									<h3><a href="{{ route('listing') }}"><span class="icon-room mr-1 text-primary"></span> {{$jetski->city}} &mdash; {{$jetski->state}}</a></h3>
									<!-- <div class="ml-auto price">
										<span class="bg-primary">$600</span>
									</div> -->
								</div>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="site-section p-20">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center pay-itself-section">
						<span class="text-serif text-primary">The Jet Ski That Pays for Itself</span>
						<p><img src=" {{ asset('assets/web/images/jet_8.png') }}" alt="Image" class="img-fluid"></p>
						
			<!-- 			<form action="#" class="row">
							<div class="form-group col-md-6">
								<label for="input-1">Full Name:</label>
								<input type="text" class="form-control" id="input-1">
							</div>
							<div class="form-group col-md-6">
								<label for="input-2">Number of People:</label>
								<input type="text" class="form-control" id="input-2">
							</div>
							<div class="form-group col-md-6">
								<label for="input-3">Date From:</label>
								<input type="text" class="form-control datepicker" id="input-3">
							</div>
							<div class="form-group col-md-6">
								<label for="input-4">Date To:</label>
								<input type="text" class="form-control datepicker" id="input-4">
							</div>
							<div class="form-group col-md-12">
								<label for="input-5">Jet Ski You're Interested in:</label>
								<select name="" id="input-5" class="form-control">
									<option value="">Motor Jet Ski</option>
									<option value="">Hi-Speed Jet Ski</option>
									<option value="">Premium Jet Ski</option>
									<option value="">Presidential Jet Ski</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="input-6">Email Address</label>
								<input type="text" class="form-control" id="input-6">
							</div>
							<div class="form-group col-md-6">
								<label for="input-7">Phone Number</label>
								<input type="text" class="form-control" id="input-7">
							</div>
							<div class="form-group col-md-12">
								<label for="input-8">Notes</label>
								<textarea name="" id="input-8" cols="30" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-12">
								<input type="submit" class="btn btn-primary py-3 px-5" value="Book Now">
							</div>
						</form> -->
					</div>
				</div>
			</div>
		</div>
		<div class="site-section bg-image overlay" style="background-image: url('/assets/web/images/hero_2.jpg');">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 text-center">
						<h2 class="text-white">Get In Touch With Us</h2>
						<p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<p class="mb-0"><a href="#" class="btn bg-primary py-3 px-5 text-white">Contact Us</a></p>
					</div>
				</div>
			</div>
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