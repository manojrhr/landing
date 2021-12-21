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
            <div class="box-body">
                <div class="text-right">
                    <a href="{{ route('admin.location.create') }}" class="btn btn-primary">Add Location</a>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 offset-md-3">
                        @if($location->id)
                            <form class="form-horizontal" method="post" action="{{ route('admin.location.update', $location->id) }}" enctype="multipart/form-data">
                        @else
                            <form class="form-horizontal" method="post" action="{{ route('admin.location.create.post') }}" enctype="multipart/form-data">
                        @endif
                            @csrf
                            <input type="hidden" name="location_id" value="{{ $location->id }}"/>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
    
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{ $location->name }}">
    
                                    @error('name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10 text-right">
                                @if($location->id)
                                    <button type="submit" class="btn btn-primary">Update Location</button>
                                    <a href="{{ route('admin.location') }}" class="btn btn-primary">New Location</a>
                                @else
                                    <button type="submit" class="btn btn-primary">Add Location</button>
                                @endif
                              </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hotel Name</th>
                            <th>Attraction</th>
                            <th>Zip</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$locations)
                            <h2><l>There is no category added. Please add a category.</l></h2>
                        @else
                        <?php $i=1 ?>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->city }}</td>
                                    <td>{{ $location->zip }}</td>
                                    <td>
                                        <a href="{{ route('admin.location_status', $location->id) }}">
                                            @if($location->active)
                                                <span class="badge bg-green">Active</span>
                                            @else
                                                <span class="badge bg-red">In-Active</span>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.location.edit', $location->id) }}">Edit</a>
                                        <a  class="btn btn-danger" href="{{ route('admin.location.delete', $location->id) }}" 
                                            onclick="return confirm('Are your sure?  All Tour Options and Airport Transfer related to this locaiton will also be deleted?')">Delete</a>
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
