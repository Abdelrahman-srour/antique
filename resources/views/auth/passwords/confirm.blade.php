@extends('layouts.auth-master')

@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Farha - login')
@section('content')
    <div class="col-md-6 col-lg-7 text-center">
        <a href="{{ '/' }}"><img src={{asset ('build/assets/images/login-logo.png')}} alt=""></a>
    </div>
    <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">{{ __('Confirm Password') }}</h2>
            </div>
            {{ __('Please confirm your password before continuing.') }}
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="input-group custom">
                    <input id="password" name="password" required autocomplete="current-password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="**********">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row pb-30">
                    <div class="col-12 text-right">
                        <div class="forgot-password">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
