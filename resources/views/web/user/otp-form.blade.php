@extends('layouts/web/web')

@section('content')

<div class="site-section login-register-main">
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Phone Number') }}</div>

                    <div class="card-body login-register-main">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('user.verify_otp') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::Id()}}">

                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('OTP') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="" min="6" max="6" required autofocus>

                                    @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify OTP') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
