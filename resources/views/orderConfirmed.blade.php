@extends('layouts.mainlayout')
@section('content')
    <section style="min-height: 525px" class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div style="margin-top: 10%; " class="col-10 ">

                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success">
                                {{__('web.Order Submitted sussefully.')}} </div>
                        </div>

                            <div class="card-body">
                                <a style="font-family:Adam-Bold!important;" href="/"
                                    class="btn-block btn btn-lg theme-btn btn-style-two "><span style="font-size: 20px">
                                        {{__('web.Back To Home')}} </span></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
