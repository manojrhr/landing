@extends('layouts/web/web')

@section('styles')
<style type="text/css">
	.profile-header{
		height: 200px;
	}
</style>
@endsection

@section('content')
<div class="profile-header" style="background-image: url('{{ asset('assets/web/images/profile-cover.jpg')}}');">
	<!-- <img src="{{ asset('assets/web/images/profile-cover.jpg') }}"> -->
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <h1 style="color: white;">Update Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-5">
	<div class="main-body">
		<div class="row gutters-sm">
			<div class="col-md-4 mb-3">
				<div class="card">
					<div class="card-body">
					<form method="post" enctype='multipart/form-data'>
					@csrf
						<div class="d-flex flex-column align-items-center text-center">
							<img src="{{ url('/'.Auth::user()->avatar) }}" alt="Admin" class="rounded-circle" width="150">
							<input type="file" name="avatar" id="avatar">
							<div class="mt-3">
								<h4>{{ Auth::user()->name }}</h4>
								<p class="text-muted font-size-sm">{{ date('d M Y', strtotime(Auth::user()->created_at)) }}</p>
								<button class="btn btn-outline-primary">Message</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card mt-3">
					<ul class="list-group list-group-flush">
						<h5>Reviews from hosts</h5>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h6 class="mb-0">No reviews yet</h6>
						</li>

					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Full Name</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" 
                                    id="name" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Email</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" 
                                    id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly="">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Phone</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" 
                                    id="phone" name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Current Password</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control" 
                                    id="current_password" name="current_password" placeholder="Current Password" value="">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">New Password</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control" 
                                    id="new_password" name="new_password" placeholder="New Password" value="">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Confirm Password</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control" 
                                    id="new_confirm_password" name="new_confirm_password" placeholder="Confirm New Password" value="">
							</div>
						</div>
						<!-- <hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Address</h6>
							</div>
							<div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" 
                                    id="phone" placeholder="Phone" value="Bay Area, San Francisco, CA">
							</div>
						</div> -->
						<!-- <hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">About</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<textarea id="about" name="about" rows="4" cols="50">{{ Auth::user()->about }}</textarea>
							</div>
						</div> -->
						<hr>
						<div class="row">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-9 text-secondary">
								<button type="submit" class="btn btn-primary">Update Profile</button>
							</div>
						</div>
					</div>
				</div>
				</form>
				<!-- <div class="row gutters-sm">
					<div class="col-sm-12 mb-3">
						<div class="card h-100">
							<div class="card-body">
								<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Booking List</h6>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
@endsection
