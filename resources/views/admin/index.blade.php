@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')

    <div class="card-box pd-20 height-100-p mb-30 ">
        <div class="row align-items-center text-left">
            <div class="col-md-4 text-center">
                <img src="{{ asset('build/assets/images/logo.png') }}" alt="">
            </div>
            <div class="col-md-8 ">
                <h4 style="display: inline" class="font-20 weight-500 mb-10 text-capitalize">
                    WELCOME BACK
                    <div style="display: inline" class="weight-600 font-30 text-primary">
                        {{ Auth::guard()->user()->first_name }} {{ Auth::guard()->user()->last_name }}!</div>
                </h4>
                <p class="font-18">
                    Here you can access all CRUD operations to <a href="{{ route('home.page') }}">ANTIQUE</a> E-commerce
                    website content
                </p>
            </div>
        </div>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ date('d-m-y') }}</div>
                        <div class="font-14 text-secondary weight-500">
                            {{ strtoupper(date('l')) }}
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy dw dw-calendar1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        @php
                            use App\Models\user; // Replace 'YourModel' with the actual model class for your table.

                            $totaluserssSum = User::count();

                        @endphp
                        <div class="weight-700 font-24 text-dark">{{ $totaluserssSum }}</div>
                        <div class="font-14 text-secondary weight-500">
                            USERS
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                            <span class="icon-copy ti-heart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        @php
                            use App\Models\Items; // Replace 'YourModel' with the actual model class for your table.

                            $totalItemsSum = Items::count();

                        @endphp
                        <div class="weight-700 font-24 text-dark">{{ $totalItemsSum }}+</div>
                        <div class="font-14 text-secondary weight-500">
                            ITEMS
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#d5aa6d">
                            <i class="icon-copy fa fa-diamond" aria-hidden="true"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        @php
                            use App\Models\Order; // Replace 'YourModel' with the actual model class for your table.

                            $totalIdSum = Order::count();

                        @endphp
                        <div class="weight-700 font-24 text-dark">{{ $totalIdSum }}</div>
                        <div class="font-14 text-secondary weight-500">ORDERS</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06" style="color: rgb(9, 204,6);">
                            <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="title pb-20 pt-20">
        <h2 class="h3 mb-0">Categories Count</h2>
    </div>
    <div class="row clearfix progress-box">
        @foreach ($categories as $category)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div class="progress-box text-center">
                        <div style="display:inline;width:120px;height:120px;">
                            <canvas width="120" height="120"></canvas>
                            <input type="text" class="knob dial1 text-primary" value="{{ $counts[$category->id] }}"
                                data-width="120" data-height="120" data-linecap="round" data-thickness="0.12"
                                data-bgcolor="#fff" data-fgcolor="#000000" data-angleoffset="180" readonly="readonly"
                                style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none rgb(255, 255, 255); font: bold 24px Arial; text-align: center; color: rgb(27, 0, 255); padding: 0px; appearance: none;">
                        </div>
                        <h5 class="text-dark padding-top-10 h5">{{ strtoupper($category->title) }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="title pb-20 pt-20">
        <h2 class="h3 mb-0">Latest Orders</h2>
    </div>
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-md-4 mb-20">
                <a href="{{ route('admin.dashboard.orders') }}" class="card-box d-block mx-auto pd-20 text-secondary">
                    <div class="img pb-30">
                        @foreach ($order->items as $orderItem)
                            <img src="{{ asset($orderItem->items->image_one) }}" alt="">
                    </div>
                    <div class="content">
                        <h3 class="h4">{{ $orderItem->items->title }}</h3>
        @endforeach
        <p class="max-width-200">
            {{ $order->first_name }} {{ $order->last_name }}
            <br>
            {{ $order->city }} - {{ $order->Region }}<br>
            <strong>{{ $formattedNumber = (int) $order->total_price }}</strong> EGP
        </p>
    </div>
    </a>
    </div>
    @endforeach
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col">
                <h4 class=" h4 text-primary">Latest Emails </h4>
            </div>
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline  text-center"
                        role="grid">
                        <thead>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>MESSAGE</th>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->full_name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
