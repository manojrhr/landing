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
                        <div class="ecommerce-editaccountform">
							@if(count( $errors ) > 0)
								<div class="alert alert-danger" role="alert">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
                            <form class="needs-validation" method="POST" action="{{ route('user.change_password') }}" novalidate>
								@csrf
                                <div class="form-group">
                                    <label class="form-label" for="current_password">Current password</label>
                                    <input type="password" class="form-control form-Input-text" name="current_password"
                                        id="current_password" autocomplete="current_password" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="new_password">New password</label>
                                    <input type="password" class="form-control form-Input-text" name="new_password"
                                        id="new_password" autocomplete="new_password" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password_2">Confirm new password</label>
                                    <input type="password" class="form-control form-Input-text" name="new_confirm_password"
                                        id="new_confirm_password" autocomplete="new_confirm_password" value="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-submit" id="save-changes">Change Password</button>
                                </div>
                            <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection
