@extends('layouts/web/master')


@section('styles')
    <link href="{{ asset('assets/web/css/login-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/web/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Section Login One -->
    <div class="section-login-one">
        <div class="container">
            <div class="main-user-form">
                <h1 class="form-title">Lost Password</h1>
                <p>Lost your password? Please enter your username or email address. You will receive a link to create a
                    new password via email.</p>
                <div class="inner-form-user inner-form-lost">
                    @if(count( $errors ) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="email">Username or email address</label>
                            <input type="text" class="form-control form-Input-text" name="email" id="email"
                                autocomplete="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group user-submit-cover">
                            <button type="submit" class="form-submit">Reset password</button>
                        </div>
                        <div class="log-in">
                            Remembered your password? <a href="{{ route('login') }}">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection

@section('scripts')

@endsection