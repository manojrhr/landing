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
                <a class="link-nav-step active" href="{{ route('tour.single', $tour_slug) }}"> Tour Booking Page</a>
                <a class="link-nav-step active" href="{{ url()->previous() }}"> Checkout</a>
                <a class="link-nav-step active pointer-none" href="#"> Order status</a>
            </div>
            <div class="checkout-form">
                @if(count( $errors ) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="checkout-form-cover">
                    <h1>Contrats!! Your payment is successful. We will get back to your for updates. Goto your <a href="{{ route('user.profile') }}">profile's page</a> for check booking details.  Thanks.</h1>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End #Main Content-->
@endsection

@section('scripts')

@endsection