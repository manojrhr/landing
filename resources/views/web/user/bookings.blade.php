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
                        <h2 class="user-details-title">Past Bookings</h2>
                        <div class="table-responsive-sm">
                            <table class="table table-user-details">
                                @if(count($bookings) > 0)
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Booked</th>
                                            <th scope="col">Order</th>
                                            <th scope="col">Start Date</th>
                                            {{-- <th scope="col">End Date </th> --}}
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->booking_id }}</td>
                                                <td><a href="{{ route('tour.single', $booking->tour->slug) }}" target="_blank">{{ $booking->tour->title }}</a></td>
                                                <td><a href="{{ route('bookingDetails', $booking->booking_id) }}">{{ $booking->booking_id }}</a></td>
                                                <td><time>{{ date('F j, Y', strtotime($booking->date)) }}</time></td>
                                                {{-- <td><time>May 13, 2021</time></td> --}}
                                                @if($booking->is_cod)
                                                    <td>Cash on delivery</td>
                                                @else
                                                    <td>{{ $booking->payment_status ? "Paid" : "Unpaid" }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="5" class="text-center">
                                            {{ $bookings->links() }}
                                        </td>
                                      </tr>
                                    </tfoot>
                                @else
                                    <thead>
                                        <tr>
                                            <th scope="col">No past booking found</th>
                                        </tr>
                                    </thead>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection
