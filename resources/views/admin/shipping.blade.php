@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div>
            <h4 class="text-center h4 text-primary">Enter Your Shipping Cost Value </h4>
        </div>

        <form action="{{ route('admin.dashboard.shipping.update') }}" method="POST">
            @csrf
            @method('put')
            <div class="input-group custom">
                <input class="form-control mr-2" value = "{{ $shipping->value }}" type="number" name="value" required>
                <input class="btn btn-outline-primary btn-sm" type="submit" value="Update Shipping">
            </div>
        </form>
    </div>
@endsection
