@extends('layouts.mainlayout')
@section('content')
    <!-- items Section -->
    <section class="news-section mt-5">
        <div class="container">
            <div class="row clearfix">
                @foreach ($categories as $item)
                    <div class=" text-center news-block col-lg-3 col-md-6 col-sm-12 ">
                        <div class="inner-box ">
                            <div class=" image ">
                                <img src="{{ asset($item->image_path) }}" alt="">
                            </div>
                        </div>
                        @if (app()->isLocale('ar'))

                        <h3 style="font-family: {{__('web.about_titles_font')}};" class="mt-1">{{ $item->title_ar }}</h3>
                        @else
                        <h3 style="font-family: {{__('web.about_titles_font')}};" class="mt-1">{{ $item->title }}</h3>

                        @endif
                        <a style="font-family:{{__('web.View_font')}};" href="{{ route('categories_items', ['id' => $item->id]) }}"
                            class="theme-btn btn-style-two  ">{{__('web.View')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End items Section -->
    <!-- Banner Section Two -->
    <div class="containerb">
        @if (app()->isLocale('ar'))
        <img style="  transform: scaleX(-1);" src="{{ asset('build/assets/images/sets.webp') }}" style="width:100%;">
        <div class="bottom-right text-right">

                    @else

                    <img src="{{ asset('build/assets/images/sets.webp') }}" style="width:100%;">
                    <div class="bottom-left text-left">
                    @endif
            <h1 style="font-weight:500;color:rgb(255, 255, 255);font-size:8vw;font-family:Handel_Becker_Bold!important;margin-bottom: 0px;height: 8vw;">
                {{__('web.UNIQUE')}}
            </h1>
            <h1 style="font-weight:500;color:#d5aa6d;font-size:7vw;font-family:Adam-Bold!important;margin-bottom: 0px;">
                {{__('web.SETS')}}</h1>
            <a style="padding:2vw;font-family:{{__('web.Shop Now_font')}};" href="{{ route('sets') }}" class="theme-btn btn-style-two-i">{{__('web.Shop Now')}}</a>
        </div>

    </div>
@endsection
