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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone #</th>
                            <th>Registered Dated</th>
                            @if($d_guy)
                                <th>Status</th>
                            @endif
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <a href="{{ route('admin.user.single',$user->id) }}">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->c_code }}{{ $user->phone }}</td>
                                <td>{{ date('d M Y', strtotime($user->created_at)) }}</td> 
                                @if($d_guy)
                                    @if($user->verified)
                                        <td><span class="label label-success">Verified</span></td>
                                    @else
                                        <td><span class="label label-danger">Not Verified</span></td>
                                    @endif
                                @endif
                                <td>
                                    @if($user->delivery_guy)
                                        @if($user->verified)
                                            <a class="btn btn-danger" href="{{route('admin.user.change_status',$user->id)}}">Deactive</a>
                                        @else
                                            <a class="btn btn-primary" href="{{route('admin.user.change_status',$user->id)}}">Verify</a>
                                            <a class="btn btn-primary" href="{{route('admin.user.change_status',$user->id)}}">Verify</a>
                                        @endif
                                    @else
                                            <a class="btn btn-primary" href="{{ route('admin.user.single',$user->id) }}">View</a>      
                                    @endif
                                    <!-- Single button -->
                                    <!-- <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if($d_guy)
                                                @if($user->verified)
                                                    <li><a href="{{route('admin.user.change_status',$user->id)}}">Deactive</a></li>
                                                @else
                                                    <li><a href="{{route('admin.user.change_status',$user->id)}}">Verify</a></li>
                                                @endif
                                            @endif
                                            <li><a href="{{route('admin.user.delete',$user->id)}}">Delete</a></li>
                                        </ul>
                                    </div> -->
                                    <!-- <a  class="btn btn-success" href="">View</a>
                                    <a  class="btn btn-primary" href="">Update</a> -->
                                    <!-- <a  class="btn btn-danger" href="" onclick="return confirm('Are you sure?')">Delete</a> -->
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@stop

@section('scripts')

<script src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
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