@extends('layouts.auth-master')

@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Farha - login')
@section('content')
    <div class="col-md-6 col-lg-7 text-center">
        <a href="{{ '/' }}"><img src={{asset ('build/assets/images/login-logo.png')}} alt=""></a>
    </div>
    <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">Reset Password</h2>
            </div>
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group custom">
                    <input type="email" name="email" required autocomplete="email" autofocus class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">

                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ __('Send Password Reset Link') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
