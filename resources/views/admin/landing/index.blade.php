@extends('layouts/admin/master')

@section('title', 'Landing Pages')
@section('subtitle', '')


@section('content')

      <div class="box">
        <div class="box-header">
            <i class="fa fa-list"></i>
            Landing Pages 
            <div class="box-tools pull-right">
                <p><a href="{{ route('admin.newlanding') }}" class="btn btn-primary">Create New Landing Page</a></p>
            </div>
        </div>
        <div class="box-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table id="datatablesSimple" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Price</th>
                        <th>Actual Price</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Price</th>
                        <th>Actual Price</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->page_name }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->price }}</td>
                            <td>{{ $page->actual_price }}</td>
                            <td>{{ $page->phone }}</td>
                            <td>{{ $page->email }}</td>
                            <th>
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="#" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>
<script>
  $('#datatablesSimple').DataTable();
</script>
@endsection