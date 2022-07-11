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
            <table id="datatablesSimple" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
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