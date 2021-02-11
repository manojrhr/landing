@extends('layouts/web/web')

@section('content')
<div class="profile-header">
	<img src="{{ asset('assets/web/images/profile-cover.jpg') }}">
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
							<div class="mt-3">
								<h4>John Doe</h4>
								<p class="text-muted font-size-sm">Joined Oct 2020</p>
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
                                    id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
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
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">About</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<textarea id="about" name="about" rows="4" cols="50">{{ Auth::user()->about }}</textarea>
							</div>
						</div>
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
