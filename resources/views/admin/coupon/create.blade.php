@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="min-height-200px">
        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <h4 class=" h4 text-primary text-center ">ADD COUPON </h4>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.dashboard.coupons.store') }}">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Coupon Code <span style="color: red">*</span> </label>
                            <input type="text" class="form-control" name="coupon_code" @required(true)>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Amount<span style="color: red">*</span></label>
                            <input class="form-control" type="number" name="amount" @required(true) placeholder=""
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Coupon type <span style="color: red">*</span> </label>
                            <select name="coupon_type" class="custom-select2 form-control select2-hidden-accessible"required
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                <option value="1">Amount</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Exp Date<span style="color: red">*</span> </label>
                            <input type="date" class="form-control" name="expiry_date" @required(true)>
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
