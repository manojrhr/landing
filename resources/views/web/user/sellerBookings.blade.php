@extends('layouts/web/web')

@section('styles')
<style type="text/css">
	.profile-header{
		height: 200px;
	}

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
._121gM {
    height: 170px;
}
</style>
@endsection

@section('content')
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
		 	@include('web.user.userProfilePart')
			<div class="col-md-8">
				<div>
				</div>
        <livewire:seller-bookings />
			</div>
		</div>
	</div>
@endsection