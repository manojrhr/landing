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
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Email</button>
                    </div>
                  </div>
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