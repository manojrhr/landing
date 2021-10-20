@extends('layouts.admin.master')

@section('title', $title)
@section('subtitle', $subTitle)

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              {{-- <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->avatar) }}" alt="User profile picture"> --}}

              <h3 class="profile-username text-center">{{ $user->first_name.' '.$user->last_name }}</h3>

              <p class="text-muted text-center">
                {{ $user->c_code.$user->phone }}
                @if($user->phone_verified_at)
                 <span class="label label-success"><i class="fa fa-check-circle margin-r-5"></i>Verified</span>
                @endif
            </p>
              <p class="text-muted text-center">{{ $user->email }}
                @if($user->email_verified_at)
                 <span class="label label-success"><i class="fa fa-check-circle margin-r-5"></i>Verified</span>
                @endif
            </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Bookings</b> <a class="pull-right">{{ $user->bookings->count() }}</a>
                </li>
                <!-- <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li> -->
              </ul>
              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          {{-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Addresses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Home</strong>

              <p class="text-muted">
                Tennessee at Knoxville
              </p>
              <hr>
            </div>
            <!-- /.box-body -->
          </div> --}}
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#details" data-toggle="tab">User Details</a></li>
              <li><a href="#password" data-toggle="tab">Change User Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="details">
                <form class="form-horizontal" method="post" action="{{ route('admin.user.update', $user->id)}}">
                @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{ $user->name }}">

                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ $user->email }}">

                        @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone" value="{{ $user->phone }}">

                        @error('phone')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Details</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="password">
                <form class="form-horizontal" action="{{ route('admin.user.password.update', $user->id)}}">
                @csrf
                  <div class="form-group" method="post">
                    <label for="inputPassword" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-danger">Update Password</button>
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