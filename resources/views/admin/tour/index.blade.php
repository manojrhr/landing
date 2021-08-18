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
                <div class="text-right">
                    <a href="{{ route('admin.tour.create') }}" class="btn btn-primary">Add Tour</a>
                </div>
                @if($tours->count() <= 0)
                    <h2 class="text-center"><l>There is no tour added. Please add a tour.</l></h2>
                @else
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                                @foreach($tours as $tour)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{-- <a href="{{ route('admin.user.single',$category->id) }}"> --}}
                                                {{ $tour->title }}
                                            {{-- </a> --}}
                                        </td>
                                        <td>{{ $tour->slug }}</td>
                                        <td>
                                            <img src="{{ asset($tour->image) }}" height="50px"/>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('admin.tour.edit', $tour->id) }}">Edit</a>
                                            <a  class="btn btn-danger" href="{{ route('admin.tour.delete', $tour->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                        </tbody>
                    </table>
                @endif
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
