@extends('layouts.admin.master')

@section('title', $title)
@section('subtitle', $subTitle)

@section('style')
        <!-- Bootstrap CSS -->
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
          <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="row">
    <!-- /.col -->
    <div class="col-md-4">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Guest Details</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="details">
                    <li class="list-group-item">
                        <b>Booked Date</b> <a class="pull-right">{{ date('F j, Y', strtotime($booking->date)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Total Guests</b> <a
                            class="pull-right">{{ $booking->adult_count + $booking->child_count }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Adult Guests</b> <a class="pull-right">{{ $booking->adult_count }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Child Guests</b> <a class="pull-right">{{ $booking->child_count }}</a>
                    </li>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="box-header with-border">
                    <h3 class="box-title">Payment Details</h3>
                </div>
                <ul class="list-group list-group-unbordered">
                  @if($booking->payment_id)
                    <li class="list-group-item">
                      <b>Paid By</b> <a class="pull-right">{{ 'PayPal' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Amount Status</b> <a class="pull-right">{{ $booking->payment_status }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Amount Received</b> <a class="pull-right">{{ $booking->amount_charged }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Payment ID</b> <a class="pull-right">{{ $booking->payment_id }}</a>
                    </li>
                  @else
                    <li class="list-group-item">
                        @if ($booking->is_cod)
                            <b>Cash on Delivery</b>
                        @else
                            <b>Payment Not Received Yet</b>
                        @endif
                    </li>
                  @endif
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="box-header with-border">
                    <h3 class="box-title">Booking Details</h3>
                </div>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Booked By</b> <a class="pull-right">{{ $booking->user->first_name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Customer Email</b> <a class="pull-right">{{ $booking->user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Customer Phone</b> <a class="pull-right">{{ $booking->user->phone }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{ $booking->tour_id === 0 ? 'Transfer' : "Tour Title" }}</b> <a class="pull-right">{{ $booking->tour_id === 0 ? 'Transfer' : $booking->tour->title }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Pickup From</b> <a class="pull-right">{{ $booking->zone->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Hotel Name</b> <a class="pull-right">{{ $booking->hotel->name ? $booking->hotel->name : '' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Total Amount</b> <a class="pull-right">{{ '$'.$booking->total_amount }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Booking Date</b> <a class="pull-right">{{ date('F j, Y', strtotime($booking->date)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Booking Received on</b> <a
                            class="pull-right">{{ date('F j, Y, g:i a', strtotime($booking->created_at)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Pickup Info</b> <a
                            class="pull-right">{{ $booking->pickup_info }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->
@stop

@section('scripts')
<!-- page script -->
<script>
</script>

@endsection
