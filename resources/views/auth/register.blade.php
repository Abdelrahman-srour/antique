@extends('layouts.auth-master')

@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Sign Up')
@section('content')
    <div class="col-md-6 col-lg-7 text-center">
        <a href="{{ '/' }}"><img src={{ asset(__('web.login_logo')) }} alt="logo"></a>
    </div>
    <div class="col-md-6 col-lg-5">

        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">{{__('web.Welcome to Selema Gold')}}</h2>
            </div>
            <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current"
                aria-hidden="false">
                <div class="form-wrap max-width-600 mx-auto">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.First Name')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8 ">
                                <input type="text" name="first_name"
                                    class=" form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.Last Name')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8 ">
                                <input type="text" name="last_name"
                                    class=" form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.Email')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.Phone Number')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8">
                                <input name="phone" type="number"
                                    class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.Password')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('web.Confirm Password')}} <span style="color: red" >*</span></label>
                            <div class="col-sm-8">
                                <input for="password-confirm" name="password_confirmation" type="password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign Up">
                                </div>
                            </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
