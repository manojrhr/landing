								@if(is_null($user->stripe_connect_id))
									<p style="padding-top: 15px;">
										<a href="{{ route('user.redirect_stripe', ['id' => $user->id]) }}">
											<button class="btn btn-primary">Add a Listing</button>
										</a>
									</p>
								@else
									<h4 class="text-danger" style="padding-top: 15px;">Your Seller Stripe Status</h4>
									@if(!$user->completed_stripe_onboarding)
										<p class="badge bg-danger text-light" style="margin-top: 15px;">Not Connected </p>
										<p><u><a href="{{ route('user.redirect_stripe', ['id' => $user->id]) }}" class="text-info font-weight-bold">Please Connect your Stripe Account</a></u></p>
									@else
										<p class="">Connected </p>
										</br>
										<p>{{$balance}}</a>
									@endif 
									<a href="{{ route('user.redirect_stripe', ['id' => $user->id]) }}" type="button" class="btn btn-primary">
										@if($user->completed_stripe_onboarding)
											View Stripe Account
										@else
											Connect Stripe Account
										@endif 										
									</a>
								@endif