@extends('layouts/web/master')


@section('styles')
    <link href="assets/web/css/login-style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/web/fonts/material-icon/css/material-design-iconic-font.min.css">

@endsection

@section('content')

    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container login-box ">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/web/img/login-img/login-hero.png" alt="sing up image"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                    </div>
                    @if(count( $errors ) > 0)
    @foreach ($errors->all() as $error)
       <h1>{{ $error }}</h1>
    @endforeach
@endif
                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email/Phone"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
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


@section('scripts')

@endsection