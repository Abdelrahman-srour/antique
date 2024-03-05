@extends('layouts.auth-master')

@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Farha - Reset password')
@section('content')
    <div class="col-md-6 col-lg-7 text-center">
        <a href="{{ '/' }}"><img src={{asset ('build/assets/images/login-logo.png')}} alt=""></a>
    </div>
    <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">Reset Password</h2>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="input-group custom">
                    <input type="email" name="email" required autocomplete="email" autofocus class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>
                <div class="input-group custom">
                    <input id="password" name="password" required autocomplete="current-password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="**********">
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                    </div>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group custom">
                    <input id="password" name="password_confirmation" required autocomplete="current-password" type="password" class="form-control form-control-lg" placeholder="**********">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ __('Reset Password') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
