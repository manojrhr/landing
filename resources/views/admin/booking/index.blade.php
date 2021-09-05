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
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
                {{-- <div class="text-right">
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create Blog Post</a>
                </div> --}}
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Booking #</th>
                            <th>Customer Name</th>
                            <th>Tour</th>
                            <th>Booked for</th>
                            <th>Booked at</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$bookings)
                            <h2><l>There is no blog post added.</l></h2>
                        @else
                        <?php $i=1 ?>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{ route('admin.booking.single', $booking->booking_id) }}">
                                            {{ $booking->booking_id }}
                                        </a>
                                    </td>
                                    <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                    <td>{{ $booking->tour->title }}</td>
                                    <td>{{ date('F j, Y', strtotime($booking->date)) }}</td>
                                    <td>{{ date('F j, Y, g:i a', strtotime($booking->created_at)) }}</td>
                                    <td>
                                        @if($booking->payment_id)
                                            {{ 'Payment Received' }}
                                        @else
                                            {{ 'Payment Pending' }}
                                        @endif
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
@stop

@section('scripts')
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language': {
            "emptyTable": "There is no Customer"
       },
    })
  })
</script>

@endsection
