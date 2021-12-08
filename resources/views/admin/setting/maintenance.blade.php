@extends('layouts.admin.master')

@section('title', 'Maintenance Mode')
@section('subtitle', '')

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="details">
                <form class="form-horizontal">
                  @if($app->isDownForMaintenance())
                    <h3>Currently Maintenance mode is on.</h3>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <a class="btn btn-lg btn-success" href="{{ route('admin.MaintenanceMode') }}">Turn off Maintenance Mode</a>
                      </div>
                    </div>
                  @else
                  <h3>Currently Maintenance mode is off.</h3>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <a class="btn btn-lg btn-danger" href="{{ route('admin.MaintenanceMode') }}">Turn on Maintenance Mode</a>
                    </div>
                  </div>
                  @endif
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('scripts')
<!-- <script type="text/javascript">
$(document).ready(function() {
      $('button.btn-primary').click(function(){
          console.log('triggered');
          alertify.error('It is working..');
      });
 });
</script> -->
@endsection