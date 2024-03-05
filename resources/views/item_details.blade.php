@extends('layouts.mainlayout')
@section('content')
    <div style="margin-top: 12%" class="container">
        <div style="border: none;" class="card mt-5">
            <div class="container-fluid">
                <div class="wrapper row ">
                    <div class="preview col-md-6">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-info">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                @if ($item->image_one)
                                    <img src="{{ asset($item->image_one) }}">
                                @endif
                            </div>
                            @if ($item->image_two)
                                <div class="tab-pane" id="pic-2">
                                    <img src="{{ asset($item->image_two) }}" />
                                </div>
                            @endif

                            @if ($item->image_three)
                                <div class="tab-pane" id="pic-3">
                                    <img src="{{ asset($item->image_three) }}" />
                                </div>
                            @endif

                            @if ($item->image_four)
                                <div class="tab-pane" id="pic-4">
                                    <img src="{{ asset($item->image_four) }}" />
                                </div>
                            @endif

                        </div>
                        <ul style="margin-top: 0px;" class="preview-thumbnail nav nav-tabs mt-3">
                            <div class="row">
                                <div class="col-3">
                                    @if ($item->image_one)
                                        <li class="active">
                                            <a data-target="#pic-1" data-toggle="tab"><img
                                                    src="{{ asset($item->image_one) }}" /></a>
                                        </li>
                                    @endif
                                </div>
                                <div class="col-3">
                                    @if ($item->image_two)
                                        <li><a data-target="#pic-2" data-toggle="tab"><img
                                                    src="{{ asset($item->image_two) }}" /></a>
                                        </li>
                                    @endif
                                </div>
                                <div class="col-3">
                                    @if ($item->image_three)
                                        <li><a data-target="#pic-3" data-toggle="tab"><img
                                                    src="{{ asset($item->image_three) }}" /></a>
                                        </li>
                                    @endif
                                </div>
                                <div class="col-3">
                                    @if ($item->image_four)
                                        <li><a data-target="#pic-4" data-toggle="tab"><img
                                                    src="{{ asset($item->image_four) }}" /></a>
                                        </li>
                                    @endif
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div class="details col-md-6 ">
                        <div class="row">
                            <div class="col">
                                <h3 class="product-title"
                                    style="font-family:{{ __('web.item_title_font') }};font-size: 20px;">
                                    @if (app()->isLocale('ar'))
                                        <span
                                            style="font-family: {{ __('web.know_us_font') }}">{{ $item->title_ar }}</span>
                                        <br>
                                        <span style="font-family: {{ __('web.know_us_font') }}">{{ $item->disc_ar }}
                                        </span>
                                </h3>
                            @else
                                {{ strtoupper($item->title) }} <br>
                                {{ $item->disc }}</h3>
                                @endif
                            </div>
                        </div>
                        <h5>
                            @if ($item->length && $item->width)
                                Size:
                                {{ $item->length }} x {{ $item->width }} cm <br>
                            @endif
                            @if ($item->sizes)
                                Size:
                                {{ $item->sizes->size_value }} <br>
                            @endif
                            <strong> {{ $formattedNumber = (int) $item->item_price }} EGP</strong> <br>
                        </h5>
                        <form action="{{ route('addToCart', ['id' => $item->id]) }}">
                            <div class="action">
                                <button type="submit" class="theme-btn btn-style-two"
                                    type="button">{{ __('web.Add to Cart') }}</button>
                        </form>
                        <a href="{{ route('wishlist.store', ['id' => $item->id]) }}" class="theme-btn btn-style-two"
                            type="button"><span class="fa fa-heart"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Banner Section Two -->
    <div style="margin-top: 5%" class="containerb">
        <div class="bottom text-center">
            <h1
                style="font-weight:500; color:#000000; font-size:5vw; font-family:{{ __('web.about_titles_font') }}; margin-bottom: 0px; height: 6.25vw;">
                {{ __('web.YOU MAY ALSO LIKE') }}
            </h1>

        </div>
    </div>
    <!--End Banner Section two-->

    <!-- slide items Section-->
    <div class="container-fluid mt-5">
        <div id="carouselExample1" class="carousel slide" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">

                @foreach ($items as $key => $item)
                    <div class="carousel-item col-lg-3 col-md-6 col-sm-12 mt-5 mb-5 {{ $key === 0 ? 'active' : '' }}">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <div class=" text-center news-block">
                                    <div class="inner-box ">
                                        <div class="image">
                                            <img style="transform: scaleX(-1);" src="{{ asset($item->image_one) }}"
                                                alt="image_one">
                                        </div>
                                    </div>
                                    <a href="{{ route('item_details', ['id' => $item->id]) }}"
                                        style="{{ __('web.item_title_font') }};margin-bottom: 0px;font-size:20px;">
                                        @if (app()->isLocale('ar'))
                                            <span
                                                style="font-family: {{ __('web.know_us_font') }}">{{ $item->title_ar }}</span>
                                        @else
                                            {{ $item->title }}
                                        @endif
                                    </a>
                                    <h3
                                        style="font-family:Adam-Bold!important;margin-bottom: 0px;color:black;font-size:16px">
                                        EGP
                                        {{ $formattedNumber = (int) $item->item_price }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" style="width: 100px;" href="#carouselExample1" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" style="width: 100px;" href="#carouselExample1" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- end slide items Section-->

    </div>
@endsection
