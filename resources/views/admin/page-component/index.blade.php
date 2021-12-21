@extends('layouts.admin.master')

@section('title', $title)
@section('subtitle', '')

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
                            <th>Slug</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$components)
                            <h2><l>There is no blog post added.</l></h2>
                        @else
                        <?php $i=1 ?>
                            @foreach($components as $component)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.user.single',$category->id) }}"> --}}
                                            {{ ucwords(str_replace("_"," ", $component->slug)) }}
                                        {{-- </a> --}}
                                    </td>
                                    <td>
                                        @if ($component->single === 1)
                                            {{ $component->body }}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.page-component.edit', $component->id) }}">Edit</a>
                                        {{-- <a  class="btn btn-danger" href="{{ route('admin.page-component.destroy', $component->id) }}" onclick="return confirm('Are you sure?')">Delete</a> --}}
                                        {{-- <form action="{{ route('admin.page-component.destroy', $component->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-danger" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                              <i class="bi bi-trash-fill" style="color:white"></i>
                                           </a>
                                        </form> --}}
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
