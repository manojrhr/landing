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
                            <form class="needs-validation" method="POST" action="{{ route('user.update_profile') }}" novalidate>
								@csrf
                                <div class="d-flex justify-content-between row-form-block">
                                    <div class="form-half-row">
                                        <div class="form-group">
                                            <label class="form-label" for="first_name">First name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control form-Input-text"
                                                name="first_name" id="first_name"
                                                autocomplete="first_name" value="{{ $user->first_name }}" required>
                                        </div>
                                    </div>
                                    <div class="form-half-row">
                                        <div class="form-group">
                                            <label class="form-label" for="last_name">Last name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control form-Input-text"
                                                name="last_name" id="last_name"
                                                autocomplete="last_name" value="{{ $user->last_name }}" required>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label" for="account_display_name">Last name&nbsp;<span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control form-Input-text" name="account_display_name"
                                        id="account_display_name" autocomplete="account_display_name"
                                        value="Another One" required>
                                    <p>This will be how your name will be displayed in the account section and in
                                        reviews</p>
                                </div> --}}
                                <div class="form-group">
                                    <label class="form-label" for="email">Email<span
                                            class="required">*</span></label>
                                    <input type="email" class="form-control form-Input-text" name="email"
                                        id="email" autocomplete="email"
                                        value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone #</label>
                                    <input type="email" class="form-control form-Input-text" name="phone"
                                        id="phone" autocomplete="phone"
                                        value="{{ $user->phone ? $user->phone : "" }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-submit" id="save-changes">Save changes</button>
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
