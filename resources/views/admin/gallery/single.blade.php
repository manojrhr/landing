@extends('layouts.admin.master')

@section('title', 'Gallery')
@section('subtitle', 'Gallary')

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
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$gallery)
                            <h2><l>There is no category added. Please add a category.</l></h2>
                        @else
                            <?php $i=1 ?>
                            @foreach($gallery->file_name as $gallery)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $gallery->slug }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.gallery.show', $gallery->id) }}">View Gallery</a>
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
