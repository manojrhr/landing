@extends('layouts/web/web')

@section('styles')
<style type="text/css">
	.profile-header{
		height: 200px;
	}
</style>
@endsection

@section('content')
<style type="text/css">
   .duraion-booking-time {
  font-size: 14px;
  padding-right: 5px;
}
.duraion-booking-time-head
{
  margin-bottom: 0;
  font-weight: 600;
  line-height: normal;
}
.duraion-booking {
  padding: 0;
  display: flex;
}
#booking-detail-modal .modal-body
{
   padding: 0;
}
#booking-detail-modal .modal-dialog {
   max-width: 700px;
}
._121gM {
   display: -webkit-box;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   flex-direction: column;
   -webkit-box-align: start;
   align-items: flex-start;
   -webkit-box-pack: center;
   justify-content: center;
   height: 130px;
   padding: 0 25px;
   background-color: #f1fcff;
}
</style>
<div class="profile-header" style="background-image: url('{{ asset('assets/web/images/profile-cover.jpg')}}');">
	<!-- <img src="{{ asset('assets/web/images/profile-cover.jpg') }}"> -->
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12 mt-5" data-aos="fade-up">
                <h1 style="color: white;">Profile</h1>
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
						<div class="d-flex flex-column align-items-center text-center">
							<img src="{{ url('/'.$user->avatar) }}" alt="Admin" class="rounded-circle" width="150">
							<div class="mt-3">
								<h4>{{ $user->name }}</h4>
								<p class="text-muted font-size-sm">Joined {{ date('m Y', strtotime($user->created_at)) }}</p>
								<button class="btn btn-outline-primary">Message</button>
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
			<div class="col-md-8">
				<div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-10 text-secondary">
							</div>
							<div class="col-sm-2 text-secondary">
								<button class="btn btn-primary float-right" onclick="window.location='{{ route("user.edit_profile") }}'">Update Profile</button>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Full Name</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								{{ $user->name }}
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Email</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								{{ $user->email }}
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Phone</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								{{ $user->phone }}
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<h6 class="mb-0">Address</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								Bay Area, San Francisco, CA
							</div>
						</div> 
					</div>
				</div>
				<div class="row gutters-sm">
					<div class="col-sm-12 mb-3">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="d-flex align-items-center mb-3">Booking List</h5>
                          <hr>
                          <div class="booking-details-row _121gM">

                            <div class="row duraion-booking">
                           <div class="col-sm-12">
                              <h6 class="duraion-booking-time"><b>Vikas Saini</b></h6>
                           </div>
                             <div class="col-sm-12">
                              <h6 class="duraion-booking-time"><b>Rent the 2019 Yamaha EX Sport Jet Ski in Livingston, Texas</b></h6>
                           </div>
                        </div>
                           <div class="row duraion-booking">
                           <div class="col-sm-12">
                     <button data-toggle="modal" data-target="#booking-detail-modal" class="btn-primary btn"> See Inqury</button>
                           </div>
                        </div>

                        </div>
                     </div>
               <!-- Modal -->
               <div class="modal fade" id="booking-detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                    <div class="card-body">
                        <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Departure Date
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">2 Hour</span>
                              <span class="duraion-booking-time">30 Minutes</span>
                           </div>
                        </div>
                           <hr>
                       <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Departure Date
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">20-05-2021</span>
                           </div>
                        </div>
                           <hr>
                          <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Return Date
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">20-05-2021</span>
                           </div>
                        </div>
                           <hr>
                         <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Duration
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">1 Day</span>
                           </div>
                        </div>
                           <hr>
                          <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Group Size
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <p> 4 People</p>
                              <span class="duraion-booking-time">Adults - 1</span>
                              <span class="duraion-booking-time">Seniors - 1</span>
                              <span class="duraion-booking-time">Children - 1</span>
                              <span class="duraion-booking-time">Infants - 1</span>
                           </div>
                        </div>
                           <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-3">
                           Impotant Notes
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</span>
                           </div>
                        </div>
                           <hr>
                           <h5 class="d-flex align-items-center mb-3">Contact Details</h5>
                          <hr>
                           <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Name
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">Vikas Saini</span>
                           </div>
                        </div>
                            <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Email
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">myemail.2gmail.com</span>
                           </div>
                        </div>
                          <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-3">
                        Mobile No.
                          </div>
                           <div class="col-sm-9 text-secondary">
                              <span class="duraion-booking-time">9876543210</span>
                           </div>
                        </div>
                            <hr>
                           <div class="row duraion-booking">
                           <div class="col-sm-9 text-secondary">
                              <p class="mb-0">Without Captain</p>
                              <span class="duraion-booking-time">I want to book without a captain, guide or host.</span>
                           </div>
                        </div>
                            <hr>
                            <div class="row duraion-booking">
                           <div class="col-sm-9 text-secondary">
                              <p class="mb-0">Payment Status</p>
                              <span class="duraion-booking-time">Payment Complete <i class="fa fa-check"></i></span>
                           </div>
                        </div>
                          
                        </div>
                        </div>
                        <div class="modal-footer d-block">
                          <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Dicline</button>
                          <button type="button" class="btn btn-primary float-right">Apporve</button>
                        </div>
                      </div>
                    </div>
                  </div>   
                  <!-- Modal close -->

                     </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
