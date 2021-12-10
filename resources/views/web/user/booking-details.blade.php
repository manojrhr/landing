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
                        <p>Order #<mark class="order-number">{{ $booking->booking_id }}</mark> was placed on <mark
                                class="order-date">{{ date("F j, Y",strtotime($booking->created_at)) }}</mark> 
                                {{-- and is currently <mark
                                class="order-status">Processing</mark>.</p> --}}
                        <section class="section-order-details">
                            <h2 class="user-details-title">Order details</h2>
                            <table class="table table-user-details table-products-details">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">{{ $booking->tour->title }}</a> <strong
                                                class="product-quantity">×&nbsp;1</strong>
                                            <ul class="wc-item-meta">
                                                <li>
                                                    <strong class="wc-item-meta-label">Pickup Location:</strong>
                                                    <p>{{ $booking->pickup_info }}</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Number of
                                                        Adults:</strong>
                                                    <p>{{ $booking->adult_count }}</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Number of
                                                        Children:</strong>
                                                    <p>{{ $booking->child_count }}</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Pickup Cost (per
                                                        Adult):</strong>
                                                    <p>{{ $booking->adult_rate }}</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Pickup Cost (per
                                                        Child):</strong>
                                                    <p>{{ $booking->child_rate }}</p>
                                                </li>
                                            </ul>
                                            <div class="wc-booking-summary">
                                                <strong class="wc-booking-summary-number">
                                                    Booking #{{ $booking->booking_id }} <span class="status-unpaid">
                                                        {{ $booking->payment_status ? "Paid" : "Unpaid" }} </span>
                                                </strong>
                                                <ul class="wc-booking-summary-list">
                                                    <li>
                                                        {{ date("F j, Y",strtotime($booking->date)) }}
                                                    </li>
                                                </ul>
                                                <div class="wc-booking-summary-actions">
                                                    <a href="{{ route('user.bookings') }}">View my bookings →</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td><span class="price-amount amount"><span
                                                    class="price-currencySymbol">$</span>{{ $booking->total_amount }}</span></td>
                                    </tr>
                                    {{-- <tr>
                                        <td><a href="airport-transfers.html">Airport Transfers</a> <strong
                                                class="product-quantity">×&nbsp;1</strong>
                                            <ul class="wc-item-meta">
                                                <li>
                                                    <strong class="wc-item-meta-label">Transfer Type:</strong>
                                                    <p>Shared</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Round Trip or One-Way
                                                        (To/From MBJ Airport):</strong>
                                                    <p>Round Trip</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Destination:</strong>
                                                    <p>Breezes Resort &amp; Spa Trelawny | Trelawny</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Number of
                                                        Adults:</strong>
                                                    <p>2</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Number of
                                                        Children:</strong>
                                                    <p>1</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Max. number of
                                                        Persons/PAX:</strong>
                                                    <p>10</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Arrival Flight
                                                        Info:</strong>
                                                    <p>JetBlue Airways (JBU | B6) | JBU1327</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Arrival Flight Date/Time
                                                        (MBJ):</strong>
                                                    <p>2021-May-01 | 12:00 AM</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Departure Flight
                                                        Info:</strong>
                                                    <p>JetBlue Airways (JBU | B6) | JBU1722</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Departure Flight
                                                        Date/Time (MBJ):</strong>
                                                    <p>2021-Jun-01 | 12:00 AM</p>
                                                </li>
                                                <li>
                                                    <strong class="wc-item-meta-label">Additional
                                                        Information:</strong>
                                                    <p>(None)</p>
                                                </li>
                                            </ul>
                                            <div class="wc-booking-summary">
                                                <strong class="wc-booking-summary-number">
                                                    Booking #3654 <span class="status-paid">
                                                        Paid </span>
                                                </strong>
                                                <ul class="wc-booking-summary-list">
                                                    <li>
                                                        May 6, 2021
                                                    </li>
                                                </ul>
                                                <div class="wc-booking-summary-actions">
                                                    <a href="bookings.html">View my bookings →</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td><span class="price-amount amount"><span
                                                    class="price-currencySymbol">$</span>102.00</span></td>
                                    </tr> --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="row">Subtotal:</th>
                                        <td><span class="price-amount amount"><span
                                                    class="price-currencySymbol">$</span>{{ $booking->total_amount }}</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment method:</th>
                                        <td>{{ $booking->is_cod ? "Cash on Delivery" : "Paypal" }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total:</th>
                                        <td><span class="price-amount amount"><span
                                                    class="price-currencySymbol">$</span>{{ $booking->total_amount }}</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </section>
                        <h2 class="user-details-title">Billing address</h2>
                        <address class="user-product-address">
                            {{ $booking->address->company }}<br>
                            {{ $booking->address->address_1 }}<br>
                            {{ $booking->address->address_2 }}<br>
                            {{ $booking->address->city }}<br>
                            {{ $booking->address->postal_code }}<br>
                            {{ $booking->address->country->name }}<br>
                            {{-- Chrystal Wallace<br>1029 Caladium Crescent<br>Montego Bay<br>Montego BAY<br>Saint --}}
                            {{-- James --}}
                            {{-- <p class="customer-icon"><i class="fas fa-phone icon-fixed"></i> 8763653207</p>
                            <p class="customer-icon"><i class="fas fa-envelope icon-fixed"></i>
                                cjaewallace@gmail.com</p> --}}
                        </address>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection