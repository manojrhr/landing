@extends('layouts/web/master')

@section('title', '| Welcome to Amaze')

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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <h1>Welcome to Amaze</h1>
      <h2>No more long drives for your monthly groceries.</h2>
      <img src="assets/web/img/hero-img.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
      <div class="btns">
        <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
        <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="padd-section text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h2>simple system for discount </h2>
          <p class="separator">Relax and order. We deliver.</p>

        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <img src="assets/web/img/svg/planet.svg" alt="img">
              <h4>User friendly interface</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <a href="#">read more</a>

            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-block">

              <img src="assets/web/img/svg/asteroid.svg" alt="img">
              <h4>build the app everyone love</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <a href="#">read more</a>

            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-block">

              <img src="assets/web/img/svg/contact-less.svg" alt="img">
              <h4>Contactless delivery</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <a href="#">read more</a>

            </div>
          </div>

        </div>
      </div>

    </section><!-- End Get Started Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us padd-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">

          <div class="col-md-5 col-lg-3">
            <img src="assets/web/img/about-img.png" alt="About" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-md-7 col-lg-5">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">

              <h2><span>Amaze</span>Delivery that is the best in your locality. </h2>
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
              </p>

              <ul class="list-unstyled">
                <li><i class="vi bi-chevron-right"></i>Easy to Use</li>
                <li><i class="vi bi-chevron-right"></i>Unlimited Features</li>
              </ul>

            </div>
          </div>

        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="padd-section text-center">

      <div class="container " data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Find Favorites and Discover New Ones</h2>
          <p class="separator">Browse thousands of restaurants and stores to get the best of your neighborhood delivered.</p>
        </div>
    </section><!-- End Features Section -->




    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="padd-section text-center">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">

          <div class="col-md-8">

            <div class="testimonials-content">
              <div id="carousel-example-generic" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner" role="listbox">

                  <div class="carousel-item  active">
                    <div class="top-top">

                      <h2>Our Users Speack volumes us</h2>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries.</p>
                      <h4>Kimberly Tran<span>manager</span></h4>

                    </div>
                  </div>

                  <div class="carousel-item ">
                    <div class="top-top">

                      <h2>Our Users Speack volumes us</h2>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries.</p>
                      <h4>Henderson<span>manager</span></h4>

                    </div>
                  </div>

                  <div class="carousel-item ">
                    <div class="top-top">

                      <h2>Our Users Speack volumes us</h2>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries.</p>
                      <h4>David Spark<span>manager</span></h4>

                    </div>
                  </div>

                </div>

                <div class="btm-btm">

                  <ul class="list-unstyled carousel-indicators">
                    <li data-bs-target="#carousel-example-generic" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carousel-example-generic" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carousel-example-generic" data-bs-slide-to="2"></li>
                  </ul>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Newsletter Section ======= -->
    <section id="newsletter" class="newsletter text-center">
      <div class="overlay padd-section">
        <div class="container" data-aos="zoom-in">

          <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6">
              <form class="d-flex" method="POST" action="#">
                <input type="email" class="form-control " placeholder="Email Adress" name="email">
                <button type="submit" class="btn btn-default"><i class="bi bi-location-arrow"></i>Subscribe</button>
              </form>
            </div>
          </div>

          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>

        </div>
      </div>
    </section><!-- End Newsletter Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="padd-section">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Contact</h2>
          <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="{{ route('post.contact') }}" method="post" role="form" class="php-email-form">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection

@section('scripts')

@endsection