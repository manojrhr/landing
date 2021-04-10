@extends('layouts.admin.master')

@section('title', 'Models')
@section('subtitle', 'Models of '.$make->name)

@section('style')
        <!-- Bootstrap CSS -->
        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
          <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Model for {{$make->name}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{route('admin.model.create',$make->id)}}">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="makeName" placeholder="Model Name">
                  </div>

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-info pull-right">Add New Model</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>

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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($make->models as $model)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    {{ $model->name }}
                                </td>
                                <td>
                                    <!-- <a  class="btn btn-success" href="">View</a>
                                    <a  class="btn btn-primary" href="">Update</a> -->
                                    <a  class="btn btn-danger" href="{{route('admin.model.delete',$model->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
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
            "emptyTable": "There is no Business User"
       },
    })
  })
</script>

@endsection