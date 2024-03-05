@extends('layouts.mainlayout')
@section('content')
    <section style="min-height: 525px" class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div style="margin-top: 10%; " class="col-10 ">
                    @if (session('success'))
                        <div class="alert alert-warning">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('cart'))
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                @foreach (session('cart') as $id => $details)
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <a href="{{ route('item_details', ['id' => $id]) }}"><img
                                                    src="{{ asset($details['image_one']) }}" class="img-fluid rounded-3"
                                                    alt="image_one"></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4">
                                            <p class="lead fw-normal mb-2">
                                                <a style="font-family:{{ __('web.item_title_font') }};"
                                                    href="{{ route('item_details', ['id' => $id]) }}">
                                                    <h4 style="display: inline">
                                                        {{ app()->isLocale('ar') ? $details['title_ar'] : $details['title'] }}
                                                        <br>
                                                    </h4>
                                                </a>
                                            </p>
                                            <h4 class="text-secondary"
                                                style="font-family:{{ __('web.item_details_font') }};display: inline;">
                                                @if ($details['length'] && $details['width'])
                                                <span style="font-family:{{ __('web.item_title_font') }};display: inline;color:#000">
                                                    {{ __('web.size') }} </span>

                                                    {{ $details['length'] }} x {{ $details['width'] }} cm
                                                @endif
                                                @if ($details['size_id'])
                                                <span style="font-family:{{ __('web.item_title_font') }};display: inline;color:#000">
                                                    {{ __('web.size') }} </span>
                                                    {{ $details['size_id'] }}
                                                @endif
                                            </h4> <br>
                                            <h4 style="font-family:{{ __('web.item_title_font') }};display: inline">
                                                {{ __('web.Qty:') }} </h4>
                                            <h4 class="text-secondary"
                                                style="font-family:{{ __('web.item_details_font') }};display: inline;">
                                                {{ $details['quantity'] }}
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h4 style="padding-right: 10px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;font-size:15px"
                                                class="price theme-btn style-two text-hover">EGP
                                                {{ $formattedNumber = (int) $details['item_price'] }}</h4>
                                            <h6 style="display: inline"></h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{ route('deleteItem', ['id' => $details['id']]) }}"
                                                class="text-secondary"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    @if (session('Applied'))
                                        <div class="alert alert-success">
                                            {{ session('Applied') }}
                                        </div>
                                    @endif


                                    <div class="row">
                                        <h6 style="font-family:{{ __('web.item_title_font') }}"
                                            class="col text-{{ __('web.text-left') }}">
                                            {{ __('web.Shipping') }}</h6>
                                        <div class="col text-{{ __('web.text-right') }}">
                                            <span style="font-family:{{ __('web.item_title_font') }};">+
                                                {{ $shipping->value }}</span>
                                        </div>
                                    </div>
                                    @if (session('Applied'))
                                        <div class="row">
                                            <h6 style="font-family:{{ __('web.item_title_font') }}"
                                                class="col text-{{ __('web.text-left') }}">{{ __('web.Discount') }}
                                            </h6>
                                            <div class="col text-{{ __('web.text-right') }}">
                                                <span style="font-family:{{ __('web.item_title_font') }};color:#6c757d78">
                                                    -
                                                    {{ number_format(session('appliedCoupon') ? session('discount') : 0) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif

                                    <br>
                                    <div class="row">
                                        <h6 style="font-family:{{ __('web.item_title_font') }}"
                                            class="col text-{{ __('web.text-left') }}">{{ __('web.Total') }}
                                            (EGP)</h6>
                                        <div class="col text-{{ __('web.text-right') }}">
                                            <span style="font-family:{{ __('web.item_title_font') }};">
                                                @if (session('appliedCoupon'))
                                                    {{ $formattedNumber = (int) session('discountedTotalPrice') }}
                                                @else
                                                    {{ $formattedNumber = (int) session('totalPrice') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <form action="{{ route('admin.dashboard.coupon.apply') }}" method="get">
                                        @method('get')
                                        @if (!session('Applied'))
                                            <div class="input-group mb-3">
                                                <input type="text" name="coupon_code" class="form-control"
                                                    placeholder="{{ __('web.Have Voucher ?') }}"
                                                    aria-label="{{ __('web.Have Voucher ?') }}"
                                                    aria-describedby="basic-addon2" required>
                                                <div class="input-group-append">
                                                    <button class="btn-block btn btn-lg theme-btn btn-style-two"
                                                        type="submit">{{ __('web.Apply') }}</button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <br>
                                    <a style="font-family:Adam-Bold!important;" href="{{ route('orders_info') }}"
                                        class="btn-block btn btn-lg theme-btn btn-style-two ">
                                        <span style="font-size: 15px">
                                            {{ __('web.Continue To Checkout') }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="card rounded-3 mb-4 d-flex align-items-center">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between text-center">
                                        <p style="font-family:{{ __('web.Your cart is empty.font') }}" class="text-center">
                                            {{ __('web.Your cart is empty.') }}</p>
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
