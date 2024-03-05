@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="min-height-200px">
        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <h4 class=" h4 text-primary text-center ">UPDATE COUPON </h4>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.dashboard.coupon.update', ['id' => $coupons->id]) }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Coupon Code <span style="color: red">*</span> </label>
                            <input value="{{ $coupons->coupon_code }}" type="text" class="form-control"
                                name="coupon_code" @required(true)>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Amount<span style="color: red">*</span></label>
                            <input value="{{ $coupons->amount }}" class="form-control" type="number" name="amount"
                                @required(true) required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{-- <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="custom-select2 form-control select2-hidden-accessible"required
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                <option value="{{ $coupons->status }}">
                                    @if ($coupons->status == 1)
                                        Enabled
                                    @else
                                        Disabled
                                    @endif
                                </option>
                                <option value="1">Enable</option>
                                <option value="0">disable</option>
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Coupon type</label>
                            <select name="coupon_type" class="custom-select2 form-control select2-hidden-accessible"required
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                <option value="{{ $coupons->coupon_type }}">
                                    @if ($coupons->coupon_type == 1)
                                    Amount
                                    @else
                                    Percentage
                                    @endif
                                </option>
                                <option value="1">Amount</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Exp Date<span style="color: red">*</span> </label>
                            <input value="{{ $coupons->expiry_date }}" type="date" class="form-control"
                                name="expiry_date" @required(true)>
                        </div>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-sm-12 col-md-12">
                        <input class="btn btn-outline-primary btn-sm" type="submit" value="SUBMIT">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
