@extends('layouts.admin.master')

@section('title', 'Change Email Address')
@section('subtitle', '')

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="details">
                <form class="form-horizontal" method="post" action="{{ route('admin.updateEmail')}}">
                @csrf
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ Auth::guard('admin')->user()->email }}">

                        @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                      <button type="submit" class="btn btn-danger">Update Email</button>
                    </div>
                  </div>
                </form>
                      <!-- <button class="btn btn-primary">Rebuild</button> -->
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