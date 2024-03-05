@extends('layouts.mainlayout')
@section('content')
    <section style="min-height: 525px" class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div style="margin-top: 10%; " class="col-10 ">
                    <div class="card rounded-3 mb-4 d-flex ">
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('orders.store') }}">
                                @csrf
                                @method('post')
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.First Name')}}</label>
                                                <input type="text" value="" class="form-control" name="first_name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Last Name')}}</label>
                                                <input type="text" value="" class="form-control" name="last_name"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Phone Number')}}</label>
                                                <input type="number" value="" class="form-control" name="phone_no"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Other Phone Number')}}</label>
                                                <input placeholder="{{__('web.optional')}}" type="number" value=""
                                                    class="form-control" name="phone_no2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Country')}}</label>
                                                <input readonly type="text" value="Egypt" class="form-control"
                                                    name="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.City')}}</label>
                                                <input type="text" value="" class="form-control" name="city"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Region')}}</label>
                                                <input type="text" value="" class="form-control" name="Region"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Address')}}</label>
                                                <input type="text" value="" class="form-control"
                                                    name="shipping_address"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>{{__('web.Apartment/Suite/Building/Floor')}}</label>
                                                <input type="text" value="" class="form-control" name="Building"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn-block btn btn-lg theme-btn btn-style-two">
                                                    <span style="font-size: 20px">{{__('web.Proceed to Submit Order')}}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
