@extends('layouts.web.master')

@section('title')

@section('styles')
@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Section Checkout One -->
    <div class="section-checkout-one">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center cart-checkout-nav">
                <a class="link-nav-step active" href="{{ route('tour.single', Session::get('tour_slug')) }}"> Tour Booking Page</a>
                <a class="link-nav-step active pointer-none" href="checkout.html"> Checkout</a>
                <a class="link-nav-step pointer-none" href="#"> Order status</a>
            </div>
            <div class="checkout-form">
                <div class="toggle-login-checout"><i class="far fa-user"></i> Returning customer? <button
                        class="checout-login-button collapsed" type="button" data-toggle="collapse"
                        data-target="#login-form-open" aria-expanded="false" aria-controls="login-form-open">Click here
                        to login</button></div>
                @if(count( $errors ) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="collapse" id="login-form-open">
                    <div class="accordion-form-inner">
                        <form class="needs-validation block-form-login" action="{{route('login')}}" method="POST" novalidate>
                            @csrf
                            <p>If you have shopped with us before, please enter your details below. If you are a new
                                customer, please proceed to the Billing section.</p>
                            <div class="form-group">
                                <label class="form-label" for="email">Email address&nbsp;<span
                                        class="required">*</span></label>
                                <input type="email" class="form-control form-Input-text" name="email" id="email"
                                    autocomplete="email" value="" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password &nbsp;<span
                                        class="required">*</span></label>
                                <input type="text" class="form-control form-Input-text" name="password" id="password"
                                    autocomplete="password" value="" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group d-flex flex-wrap justify-content-between">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="lost-password.html">Lost your password?</a>
                            </div>
                            <div class="form-group user-submit-cover">
                                <button type="submit" class="form-submit" id="login-button">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="toggle-login-coupon"><i class="fas fa-ticket-alt"></i> Have a coupon? <button
                        class="coupon-login-button collapsed" type="button" data-toggle="collapse"
                        data-target="#coupon-form-open" aria-expanded="false" aria-controls="coupon-form-open">Click
                        here to enter your code</button>
                </div>
                <div class="collapse" id="coupon-form-open">
                    <div class="accordion-form-inner">
                        <form class="needs-validation block-form-coupon" novalidate>
                            <p>If you have a coupon code, please apply it below.</p>
                            <div class="form-group d-flex flex-wrap">
                                <input type="text" class="form-control form-Input-text" name="username" id="username"
                                    autocomplete="username" value="" required>
                                <button type="submit" class="form-submit" id="apply-coupon">Apply coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="checkout-form-cover">
                    <form class="needs-validation" action="{{  route('paypal')  }}" method="POST" novalidate>
                        @csrf
                        <input type="hidden" name="booking[tour_id]" value="{{ $booking->tour_id }}"/>
                        <input type="hidden" name="booking[location_id]" value="{{ $booking->location_id }}"/>
                        <input type="hidden" name="booking[date]" value="{{ $booking->date }}"/>
                        <input type="hidden" name="booking[adult_rate]" value="{{ $booking->adult_rate }}"/>
                        <input type="hidden" name="booking[child_rate]" value="{{ $booking->child_rate }}"/>
                        <input type="hidden" name="booking[total_amount]" value="{{ $booking->total_amount }}"/>
                        <input type="hidden" name="booking[adult_count]" value="{{ $booking->adult_count }}"/>
                        <input type="hidden" name="booking[child_count]" value="{{ $booking->child_count }}"/>
                        <input type="hidden" name="booking[pickup_info]" value="{{ $booking->pickup_info }}"/>
                        <div class="row">
                            <div class="col-md-7 info">
                                <div class="customer_details">
                                    <h3 class="checkout-step-title">Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="first_name">First name&nbsp;<span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control form-Input-text"
                                                    name="first_name" id="first_name" autocomplete="first_name" value="{{  old('first_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="last_name">Last name&nbsp;<span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control form-Input-text"
                                                    name="last_name" id="last_name" autocomplete="last_name" value="{{  old('last_name') }}" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="Room_Number">Room Number
                                                    (optional)</label>
                                                <input type="text" class="form-control form-Input-text"
                                                    name="Room_Number" id="Room_Number"
                                                    autocomplete="Room_Number"
                                                    placeholder="Please Provide Your Room Number" value="">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="phone">Phone&nbsp;<span
                                                        class="required">*</span></label>
                                                <input type="tel" class="form-control form-Input-text"
                                                    name="phone" id="phone" autocomplete="phone" value="{{  old('phone') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="email">Email&nbsp;<span
                                                        class="required">*</span></label>
                                                <input type="email" class="form-control form-Input-text"
                                                    name="email" id="email" autocomplete="email" value="{{  old('email') }}" required>
                                            </div>
                                        </div>
                                        @guest
                                        <div class="col-md-12">
                                            <div class="form-group form-check form-check-inline">
                                                <input class="form-check-input createaccount" type="checkbox"
                                                    name="createaccount" id="createaccount" value="1" onchange="valueChanged()">
                                                <label class="form-check-label" for="createaccount">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div id="createaccount-password" class="col-md-12" style="display:none;">
                                            <div id="password" class="form-group">
                                                <label class="form-label" for="newpassword">Password &nbsp;<span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control form-Input-text" name="password"
                                                    id="newpassword" autocomplete="password" value="" required disabled>
                                            </div>
                                        </div>
                                        @endguest
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="order_comments">Order notes
                                                    (optional)</label>
                                                <textarea name="order_comments" class="form-control form-Input-text"
                                                    id="order_comments"
                                                    placeholder="Notes on your order, e.g. special notes concerning delivery."
                                                    rows="2" cols="5" spellcheck="false"></textarea>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="note-form"> Please Note : - <br>1. It’s a Charted/Private Taxi and
                                        Minimum Total Cost to Book is 4 times Price per Person for Upto 4 Persons. <br>
                                        2. For more than 4 Persons Total Cost increases per additional Person.<br>
                                        3. For Groups 10 or more Persons you will get 10 % Discount.<br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 cart-order-details">
                                <div class="order-review">
                                    <h3 class="checkout-step-title">Your order</h3>
                                    <div class="product-order-review">
                                        <div class="d-flex justify-content-between product_cart_item">
                                            <div class="product-name">
                                                {{ $tour->title }}
                                                {{-- <span class="product-quantity">×&nbsp;1</span> --}}
                                                <dl class="variation">
                                                    <dt>Pick Up &amp; Drop Off Area/City</dt>
                                                    <dd>
                                                        <p>{{ $location->name }}</p>
                                                    </dd>
                                                    <br>
                                                    <dt>Pickup Date of Tour</dt>
                                                    <dd>
                                                        <p>{{ $booking->date }}</p>
                                                    </dd>
                                                    <br>
                                                    <dt>Number of Guests (Adult/Child)</dt>
                                                    <dd>
                                                        <p>Total: {{ $booking->adult_count + $booking->child_count }} ({{ $booking->adult_count }}/{{ $booking->child_count }})</p>
                                                    </dd>
                                                    {{-- <br>
                                                    <dt>Pickup Time of Tour ( hour:minute AM/PM )</dt>
                                                    <dd>
                                                        <p>11:11 m</p>
                                                    </dd>
                                                    <br>
                                                    <dt>Pickup &amp; Drop Off Resort Name OR AirBnb/Villa/Home Address
                                                        OR Cruise Ship Port Name</dt>
                                                    <dd>
                                                        <p>DF</p>
                                                    </dd> --}}
                                                </dl>
                                            </div>
                                            <div class="product-total">
                                                <span class="price-amount"><span
                                                        class="price-currencysymbol">$</span>{{ $booking->total_amount }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between cart-subtotal">
                                            <div class="subtotal-label">Subtotal</div>
                                            <div class="subtotal-amount">
                                                <span class="subtotal-price-amount"><span
                                                        class="price-currencysymbol">$</span>{{ $booking->total_amount }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between order-total">
                                            <div class="order-total-label">TOTAL</div>
                                            <div class="order-total-amount">
                                                <span class="order-total-amount"><span
                                                        class="price-currencysymbol">$</span>{{ $booking->total_amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="payment" class="checkout-payment">
                                        <ul class="payment_methods">
                                            <li class="payment_method_cod">
                                                <label>Pay by Cash or Card When We Pick You Up</label>
                                                <div class="payment_box">
                                                    <p class="no-margin">Pay by Cash or Card When We Pick You Up</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="place-order">
                                            <p>Your personal data will be used to process your order, support your
                                                experience throughout this website, and for other purposes described in
                                                our <a href="privacy-policy.html" class="privacy-policy-link"
                                                    target="_blank">privacy policy</a>.</p>
                                        </div>
                                        <div class="checkout-submit-cover">
                                            <button type="submit" class="form-submit-checkout" id="login-button">Place
                                                order</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End #Main Content-->
@endsection

@section('scripts')
<script type="text/javascript">
    function valueChanged()
    {
        if(jQuery('#createaccount').is(":checked"))  { 
            jQuery("#createaccount-password").show();
            jQuery("#newpassword").prop('disabled', false);
        } else{
            jQuery("#createaccount-password").hide();
            jQuery("#newpassword").prop('disabled', true);
        }
    }
</script>
@endsection