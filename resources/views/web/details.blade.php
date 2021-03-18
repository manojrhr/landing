@extends('layouts/web/web')

@section('styles')
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets/web/css/starrr.css') }}">
@endsection

@section('content')
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://skiski.ca/web/images/slider-1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://skiski.ca/web/images/slider-2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://skiski.ca/web/images/slider-3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="product-name">
						<h2>SeaDoo GTI130 Rental in Littleton</h2>
					</div>
					<div class="row reviews-booking-tab">
						<div class="col-6">
							<span><img class="" src="https://skiski.ca/web/images/review-stars.png" alt="reviews"> 6 reviews</span>
						</div>
						<div class="col-6">
							<span><i class="fa fa-check-circle" aria-hidden="true"></i> 151 bookings</span>
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-12 _1yVAB">
							<p class="mb-3">Take to the water for an exhilarating jet ski adventure in Livingston, Texas. 
								Book the Yamaha EX Sport Jet Ski for 1-2 person. Rates as low as $50 per 
								hour each or only $475 per day for both.</p>
							<p>Get ready for a memorable experience and enjoy the sun and the surf<span id="dots">...</span>
								<span id="more" style="display:none; ">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span>
							 </p>
							<span onclick="myFunction()" id="myBtn" class="read-more">Read full description</span>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 jet-info-box">
							<div class="jet-ski-info">
								<div class="captain-incld">
									<img src="https://skiski.ca/web/images/captain-img.png">
							</div>
							<div class="captain-incld-text row">
									<div class="captain-incld-head col-12">Captain is not included.</div>
									<div class="captain-incld-detail col-12">Trip may require hiring additional qualified personnel.</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 jet-info-box col-xs-12 col-sm-12">
							<div class="jet-ski-info">
								<div class="captain-incld">
									<img src="https://skiski.ca/web/images/capcity.png">
							</div>
							<div class="captain-incld-text row">
									<div class="captain-incld-head col-12">Capacity</div>
									<div class="captain-incld-detail col-12">3 guests</div>
							</div>
						</div>
						<div class="jet-ski-info">
								<div class="captain-incld">
									<img src="https://skiski.ca/web/images/jet-ski-ico.png">
						</div>
						<div class="captain-incld-text row">
								<div class="captain-incld-head col-12">Jetskis & Personal Watercraft</div>
								<div class="captain-incld-detail col-12">Jet Ski</div>
							</div>
						</div>
					</div>
				</div>
				<div class="owener-info-box mt-5">
				<div class="row">
					<div class="col-lg-2">
						<div class="owner-info">
							<div class="owner-img">
								<img src="https://www.bootdey.com/img/Content/avatar/avatar7.png" alt="Image" class="">
							</div>
						</div>
					</div>
					<div class="col-lg-10">
						<div>
							<h2 class="_sNM-">
							<span class="_2nErR">Owner:</span>
						Avatar
					</h2>
					<p class="_14o15">We welcome you to explore the extensive and incredible experience in order to get a glimpse of the mysterious and entrancing Scuba diving in India as well as water sports in Malvan.We have an idyllic setting and a trustworthy guidance which ends right here at Malvan. We make sure to provide a high quality and matchless experience for all the tourists who head here from all over the globe, to get a glance of this exciting and truly mesmerizing Scuba diving experience.</p>
					</div>
					</div>
				</div>
			</div>

			<section class="wQZ5i mt-5">
				<h2 class="_3kuNF">Features &amp; Details</h2>
				<div class="_1zioW"></div>
				<ul class="_3vXws">
					<li class="yf0t7"><img src="https://skiski.ca/web/images/life-vest.svg"> Life jackets/required safety gear</li>
					<li class="yf0t7">Inboard Engine</li>
					<li class="yf0t7">Single Engine</li>
				</ul>
			</section>

			<div class="mt-5">
				<div class="">
					<h3 class="a77sY">Cancellation Policy</h3>
					<p class="_1VPsY">Full refund up to 5 days prior.</p>
					<div class="_3cy0U">
						<h3 class="_4Yb2b">Additional Terms &amp; Information</h3>
					<div>
					<p class="_1vO7e">Age Requirement:- 10+ years.</p>
					</div>
					</div>
				</div>
			</div>

			<section class="similar-listings-row mt-5">
				<h3 class="_2GGNL mb-3">Similar Listings</h3>
				<div class="row">
					
					<div class="box-similar col-4">
						<div class="box-similar-img">
						<img src="https://getmyboat-user-images1.imgix.net/images/54b1863d8d5e9/boat-rentals-vasco-da-gama-goa-rinker-ec-260-processed.jpg?auto=format%2Ccompress%2Cenhance&fit=crop&h=180&ixlib=react-9.0.2&q=80&w=300&lossless=true&faces=false&w=300&q=50&dpr=1">

					</div>
					<div class=""><span class="_1_8Lcx">$440/hour</span></div>
					<div class="_3Ob99"><span class="_1_8Lc">2 guests</span></div>
					<p class="_2-oCe">
						<a class="_3aa3R" href="">Champions Party Cruiser Catamaran for Rent in Panjim</a>
					</p>
				</div>
				<div class="box-similar col-4">
						<div class="box-similar-img">
						<img src="https://getmyboat-user-images1.imgix.net/images/54b1863d8d5e9/boat-rentals-vasco-da-gama-goa-rinker-ec-260-processed.jpg?auto=format%2Ccompress%2Cenhance&fit=crop&h=180&ixlib=react-9.0.2&q=80&w=300&lossless=true&faces=false&w=300&q=50&dpr=1">
					</div>
					<div class=""><span class="_1_8Lcx">$440/hour</span></div>
					<div class="_3Ob99"><span class="_1_8Lc">2 guests</span></div>
					<p class="_2-oCe">
						<a class="_3aa3R" href="">Champions Party Cruiser Catamaran for Rent in Panjim</a>
					</p>
				</div>
				<div class="box-similar col-4">
						<div class="box-similar-img">
						<img src="https://getmyboat-user-images1.imgix.net/images/54b1863d8d5e9/boat-rentals-vasco-da-gama-goa-rinker-ec-260-processed.jpg?auto=format%2Ccompress%2Cenhance&fit=crop&h=180&ixlib=react-9.0.2&q=80&w=300&lossless=true&faces=false&w=300&q=50&dpr=1">

					</div>
					<div class=""><span class="_1_8Lcx">$440/hour</span></div>
					<div class="_3Ob99"><span class="_1_8Lc">2 guests</span></div>
					<p class="_2-oCe">
						<a class="_3aa3R" href="">Champions Party Cruiser Catamaran for Rent in Panjim</a>
					</p>
				</div>
			</div>
			</section>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="send-booking-inquiry _1W2S4">
					<button class="send-booking-inquiry-btn btn-primary">Send a Booking Inquiry</button>
					<p class="EA0Vq">You’ll get a custom price, itinerary and answers to your questions in the next step.</p>
					<div class="_29j21">
						<div class="_2oHrE">
							<sup class="_2Ev4T">From</sup>
							<div class="_3JqG_">
								<span class="_1qauV">$</span>617<sub class="_39y-F">/hour</sub>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
@endsection

@section('scripts')
  <script src="{{ asset('assets/web/js/starrr.js') }}"></script>
  <script>
      $('#star1').starrr({
        rating: 4,
        readOnly: true
      });
  </script>
@endsection