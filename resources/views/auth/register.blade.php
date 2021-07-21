@extends('layouts/web/master')

@section('title', '| Sign Up')

@section('styles')
    <link href="{{ asset('assets/web/css/login-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/web/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
@endsection

@section('content')

<div class="main">

<!-- Sign up form -->
<section class="signup ">
    <div class="container signup-box">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                @if(count( $errors ) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Your Name*" />
                        
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email"/>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label for="phone"><i class="zmdi zmdi-phone"></i></label> -->
                            <input id="phone" name="phone" type="tel" placeholder="Phone*">
                            <input id="c_code" name="c_code" type="hidden" value="+91">
                            <!-- <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Phone"/> -->
                            
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password*"/>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                       <div class="form-group">
                            <label for="" class="label-agree-term">Signup as*</label> </br>
                        <div class="signup-as">
                            <input type="radio" name="delivery_guy" id="customer" value="0" class="agree-term" checked/>
                            <label for="customer" class="label-agree-term"><span><span></span></span>Customer</label></div>
                        <div class="signup-as">
                            <input type="radio" name="delivery_guy" id="delivery_guy" value="1" class="agree-term" />
                            <label for="delivery_guy" class="label-agree-term"><span><span></span></span>Delivery Guy</label>
                      </div>
                    </div>
                  
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all <a href="/terms" target="blank" class="term-service">Terms & Conditions</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="assets/web/img/login-img/signup-image.jpg" alt="sing up image"></figure>
                <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>


</div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/web/js/intlTelInput.js') }}"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
    //   initialCountry: "auto",
    //     geoIpLookup: function(success, failure) {
    //         $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //         var countryCode = (resp && resp.country) ? resp.country : "us";
    //         success(countryCode);
    //         });
    //     },
    //   hiddenInput: "full_number",
      // localizedCountries: { 'de': 'Deutschland' },
    //   nationalMode: true,
      onlyCountries: ['in', 'us'],
      // placeholderNumberType: "MOBILE",
      preferredCountries: ['in'],
      // separateDialCode: true,
      utilsScript: "{{ asset('assets/web/js/utils.js') }}",
      
    });
  </script>
@endsection