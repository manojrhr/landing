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
                <h1 class="form-title">Login</h1>
                <div class="inner-form-user">
                    @if(count( $errors ) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" class="needs-validation" id="login-form" action="{{route('login')}}" novalidate>
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="username">Email address&nbsp;<span class="required">*</span></label>
                            {{-- <input type="text" class="form-control form-Input-text" name="username" id="username" autocomplete="username" value="" required> --}}
                            <input type="text" class="form-control form-Input-text" name="email" id="email" placeholder="Email/Phone" autocomplete="username" value="" required/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password &nbsp;<span class="required">*</span></label>
                            {{-- <input type="text" class="form-control form-Input-text" name="password" id="password" autocomplete="password" value="" required> --}}
                            <input type="password" class="form-control form-Input-text" name="password" id="password" placeholder="Password"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group form-check form-check-inline">
                           {{-- <input class="form-check-input" type="checkbox" id="rememberme" value="forever">
                           <label class="form-check-label" for="rememberme">Remember me</label> --}}
                           <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}/>
                           <label for="remember" class="form-check-label"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group user-submit-cover">
                            <button type="submit" class="form-submit" id="login-button">Log in</button>
                        </div>
                        <div class="row justify-content-between">
                            {{-- <div class="col-md-6 sign-up">
                                Don't have an account? <a href="{{route('register')}}">Sign Up</a>
                            </div> --}}
                            <div class="col-md-12 lost-password text-right">
                                <a href="{{ route('password.request') }}">Lost your password?</a>
                            </div>
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