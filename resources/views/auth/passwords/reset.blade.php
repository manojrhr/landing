@extends('layouts/web/master')

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
                @if (session('status'))
                    <p class="alert alert-success">{{ session('status') }}</p>
                @endif
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="form-label" for="email">E-Mail Address</label>
                            <input type="text" class="form-control form-Input-text @error('email') is-invalid @enderror" name="email" id="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('Password') }}</label>
                            <input type="password" class="form-control form-Input-text @error('password') is-invalid @enderror" name="password" id="password"
                               required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="email">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control form-Input-text" name="password_confirmation" id="password"
                               required autocomplete="new-password">
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
