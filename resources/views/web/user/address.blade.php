@extends('layouts/web/master')

@section('styles')
@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Section Account One -->
    <div class="section-account-one">
        <div class="container">
            <h1 Class="title-main-page">My account</h1>
            <div class="d-flex flex-wrap justify-content-between row-account-user">
                @include('includes.user.profile-menu')
                <div class="user-info-data">
                    <div class="inner-user-info-data">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <div class="d-flex flex-wrap justify-content-between ecommerce-addresses-user">
                            @foreach ($addresses as $address)
                                <div class="col-half-address">
                                    <header
                                        class="d-flex flex-wrap justify-content-between ecommerce-address-title">
                                        <h3 class="title-h3"></h3>
                                        <a href="{{ route('user.editAddress', $address->id) }}" class="edit">Edit</a>
                                    </header>
                                    <address>
                                        {{ $address->company }}<br>
                                        {{ $address->address_1 }}<br>
                                        {{ $address->address_2 }}<br>
                                        {{ $address->city }}<br>
                                        {{ $address->postal_code }}<br>
                                        {{ $address->country->name }}<br>
                                    </address>
                                </div>
                            @endforeach
                            {{-- <div class="col-half-address">
                                <header
                                    class="d-flex flex-wrap justify-content-between ecommerce-address-title">
                                    <h3 class="title-h3">Shipping address</h3>
                                    <a href="shipping.html" class="add">Add</a>
                                </header>
                                <address>You have not set up this type of address yet.</address>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection
