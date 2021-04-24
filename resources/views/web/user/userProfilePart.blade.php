
			<div class="col-md-4 mb-3">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="{{ url('/'.$user->avatar) }}" alt="Admin" class="rounded-circle" width="150">
							<div class="mt-3">
								<h4>{{ $user->name }}</h4>
								<p class="text-muted font-size-sm">Joined {{ date('m Y', strtotime($user->created_at)) }}</p>
								@if(Auth::user()->jetskis)
									<a href="{{ route('user.seller.jetski') }}">
										<button class="btn btn-outline-primary">My Jet Ski</button>
									</a>
								@endif
								@include('web.user.stripebutton')
							</div>
						</div>
					</div>
				</div>
				<div class="card mt-3">
					<ul class="list-group list-group-flush">
						<h5>Reviews from hosts</h5>
					</ul>
				</div>
			</div>