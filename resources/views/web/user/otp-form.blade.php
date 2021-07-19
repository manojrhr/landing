@extends('layouts/web/master')

@section('styles')
    <link href="{{ asset('assets/web/css/login-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/web/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
@endsection

@section('content')

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container login-box ">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('assets/web/img/login-img/login-hero.png') }}" alt="sing up image"></figure>
                    <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Log in</h2>
                    @if(count( $errors ) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" class="register-form" id="login-form" action="{{ route('user.verify_otp') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::Id()}}">
                        <div class="form-group">
                            <label for="otp"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="otp" id="otp" placeholder="Please enter OTP sent on you mobile" min="6" max="6" required autofocus/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
