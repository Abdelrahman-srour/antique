@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">

        <form action="{{ route('admin.dashboard.change.password.changePassword') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Current Password</label>
                <div class="col-sm-12 col-md-10">
                    <input type="password"
                        class="form-control  @error('old_password') is-invalid @enderror" name="old_password" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">New Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="password" class="form-control  @error('new_password') is-invalid @enderror"
                            name="new_password" required>
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-12 col-md-10">
                        <input type="password" class="form-control" name="new_password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-sm-12 col-md-12">
                        <input class="btn btn-outline-primary btn-sm" type="submit" value="Update Password">
                    </div>
                </div>
        </form>
    </div>

@endsection
