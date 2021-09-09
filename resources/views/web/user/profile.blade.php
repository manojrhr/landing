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
					<p>Hello <strong>{{ $user->first_name.' '.$user->last_name }}</strong> (not <strong>{{ $user->first_name.' '.$user->last_name }}</strong>? <a href="#">Log out</a>)</p>
					<p>From your account dashboard you can view your <a href="orders.html">recent orders</a>, manage your <a href="edit-address.html">shipping and billing addresses</a>, and <a href="edit-account.html">edit your password and account details</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	</div>
	<!-- End #Main Content-->
@endsection
