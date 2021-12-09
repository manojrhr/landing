@extends('layouts/web/master')

@section('styles')
@endsection

@section('content')
<!-- #Main Content-->
<div id="main-content">
	<!-- Section Account One -->
	<div class="section-account-one">
		<div class="container">
		<h1 Class="title-main-page">My account</h1>
			<div class="d-flex flex-wrap justify-content-between row-account-user">
				@include('includes.user.profile-menu')
				<div class="user-info-data">
					<div class="inner-user-info-data">
					<p>Hello <strong>{{ $user->first_name.' '.$user->last_name }}</strong> (not <strong>{{ $user->first_name.' '.$user->last_name }}</strong>? <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Log out</a>)</p>
					<p>From your account dashboard you can view your <a href="{{ route('user.bookings') }}">recent bookings</a>, manage your <a href="edit-address.html">shipping and billing addresses</a>, and <a href="{{ route('user.get_password_form') }}">edit your password</a> and <a href="{{ route('user.edit_profile') }}">account details</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End #Main Content-->
@endsection
