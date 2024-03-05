@extends('layouts.auth-master')

@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Sign In')
@section('content')
    <div class="col-md-6 col-lg-7 text-center">
        <a href="{{ '/' }}"><img src={{ asset(__('web.login_logo')) }} alt=""></a>
    </div>
    <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">{{ __('web.Welcome back !') }}</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group custom">
                    <input type="email" name="email" required autocomplete="email" autofocus
                        class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group custom">
                    <input id="password" name="password" required autocomplete="current-password" type="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        placeholder="**********">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row pb-30">
                    <div class="col-12 text-right">
                        <div class="forgot-password">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{__('web.Forgot Your Password?')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ __('web.login') }}">
                        </div>
                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"
                            style="color: rgb(112, 115, 115);">
                           {{ __('web.or')}}
                        </div>
                        <div class="input-group mb-0">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register') }}">{{__('web.Register To Create Account')}}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
