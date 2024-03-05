@extends('layouts.mainlayout')
@section('content')
    <!-- categories Section -->
    <section class="news-section mt-5">
        <div class="text-center mt-3 mb-5">
            @if (app()->isLocale('ar'))
                <h1 style="font-family: {{ __('web.know_us_font') }};color:#1F2D51!important;font-weight:bold;">
                    {{ $category->title_ar }} </h1>
                <p style="font-family: {{ __('web.know_us_font') }};color:#1F2D51!important">{!! wordwrap($category->disc_ar, 100, "<br>\n") !!}</p>
            @else
                <h1 style="font-family: {{ __('web.know_us_font') }};color:#1F2D51!important;font-weight:bold;">
                    {{ strtoupper($category->title) }}</h1>
                <p style="font-family: {{ __('web.know_us_font') }};color:#1F2D51!important">{!! wordwrap($category->disc, 100, "<br>\n") !!}</p>
            @endif
        </div>
        <div class="container">
            <div class="row clearfix">
                @foreach ($categories_items as $item)
                    <div class=" text-center news-block col-lg-3 col-md-6 col-sm-12 ">
                        <a href="{{ route('item_details', ['id' => $item->id]) }}">
                            <div class="inner-box ">
                                <div class="image">
                                    <img src="{{ asset($item->image_one) }}" alt="">
                                </div>
                            </div>
                            @if (app()->isLocale('ar'))
                                <h3 style="font-family: {{ __('web.know_us_font') }};" class="mt-1">{{ $item->title_ar }}
                                </h3>
                            @else
                                <h3 style="font-family: {{ __('web.know_us_font') }};" class="mt-1">
                                    {{ strtoupper($item->title) }}
                                </h3>
                            @endif
                            <h5 style="font-family: {{ __('web.know_us_font') }};color:#C3BD86">
                                {{ $formattedNumber = (int) $item->item_price }} EGP
                            </h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End items Section -->
    @if (app()->isLocale('ar'))
        <div class="containerb mb-5 ">
            <img style="transform: scaleX(-1);" src="{{ asset('build/assets/images/home6.png') }}" style="width:100%;">
            <div class="center-right text-right">
                <h1
                    style="font-weight:500;color:#1e2d51;font-size:2vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;height: 10vh;width:30vw;">
                    مجموعة انتيك هي خيارك الأفضل لنوم جيد في الصيف. الأغطية خفيفة وناعمة، ويمكن استخدامها قبل فصل الشتاء
                    عندما لا تشعر
                    بالحرارة أو البرودة.
                </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:7vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;width:30vw;margin-top:40%">
                    {{ __('web.Coverlets') }}</h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:3vw;font-family:{{ __('web.new_arrival_font') }};margin-bottom: 0px;width:30vw;">
                    {{ __('web.New Arrivals') }}</h1>
                <a href="{{ route('categories_items', ['id' => 4]) }}"
                    style="font-family: Graphik!important;display:block;font-size:1vw;"
                    class="btn btn-outline-secondary-white pull-left ">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
        <div class="containerb mb-5">
            <img style="transform: scaleX(-1);" src="{{ asset('build/assets/images/home1.png') }}" style="width:100%;">
            <div class="center-left text-right">
                <h1
                    style="font-weight:500;color:#ffffff;font-size:2vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;height: 10vh;width:30vw;">
                    مجموعة انتيك هي خيارك الأمثل لفصل الشتاء الدافئ. ستمنحك التصميمات الملونة والمواد الدافئة الرقيقة شتاءً
                    سعيدا. </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:4vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;width:20vw;margin-top:20%">
                    لــحــاف </h1>
                <a href="{{ route('categories_items', ['id' => 6]) }}"
                    style="font-family: Graphik!important;display:block;margin-top: 0px!important;font-size:1vw;"
                    class="btn btn-outline-secondary pull-left mt-5 m-2">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
        <div class="containerb mb-5 ">
            <img style="transform: scaleX(-1);" src="{{ asset('build/assets/images/home7.png') }}" style="width:100%;">
            <div class="center-right text-right">
                <h1
                    style="font-weight:500;color:#1e2d51;font-size:2vw;font-family:{{ __('web.know_us_font') }};height: 10vh;width:30vw;">
                    تمتع مع بطانياتنا الفاخرة، المصممة لكل من الراحة والعملية. بالراحة والدفء مع بطانياتنا الفاخرة، المصممة
                    لقضاء الليالي الأكثر راحة
                </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:7vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;width:30vw;margin-top:20%">
                    بــطــانــيــة</h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:3vw;font-family:{{ __('web.new_arrival_font') }};margin-bottom: 0px;width:30vw;">
                    {{ __('web.New Arrivals') }}</h1>
                <a href="{{ route('categories_items', ['id' => 3]) }}"
                    style="font-family: {{ __('web.Graphik') }};display:block;margin-right:45%;margin-top: 0px!important;font-size:1vw;"
                    class="btn btn-outline-secondary-white pull-left mt-5 ">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
    @else
        <div class="containerb mb-5 ">
            <img src="{{ asset('build/assets/images/home6.png') }}" style="width:100%;">
            <div class="center-left text-left">
                <h1
                    style="font-weight:500;color:#1e2d51;font-size:2vw;font-family:{{ __('web.Graphik') }};margin-bottom: 0px;height: 10vh;width:30vw;">
                    <span style="font-size: 40pt;font-family: {{ __('web.BebasNeue-Regular') }};">OUR</span>
                    Coverlets collection is your best choice for a good summer sleep. The coverlets are light and
                    smooth
                    still,
                    they can be used before the winter season when you are not feeling hot nor feeling cold.
                </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:7vw;font-family:{{ __('web.know_us_font') }};margin-bottom: 0px;width:30vw;margin-top:56%">
                    {{ __('web.Coverlets') }}</h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:3vw;font-family:{{ __('web.new_arrival_font') }};margin-bottom: 0px;width:30vw;">
                    {{ __('web.New Arrivals') }}</h1>
                <a href="{{ route('categories_items', ['id' => 4]) }}" style="font-family: Graphik!important;display:block;font-size:1vw;"
                    class="btn btn-outline-secondary-white pull-right ">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
        <div class="containerb mb-5">
            <img src="{{ asset('build/assets/images/home1.png') }}" style="width:100%;">
            <div class="center-right text-left">
                <h1
                    style="font-weight:500;color:#ffffff;font-size:2vw;font-family:{{ __('web.Graphik') }};margin-bottom: 0px;height: 10vh;width:30vw;">
                    <span style="font-size: 40pt;font-family: {{ __('web.BebasNeue-Regular') }};">W</span>
                    hen it comes to winter, no one can deny their need for a fluffy yet, a warming quilt. That is why
                    our
                    quilts collection is your best choice for a warm winter.
                </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:4vw;font-family:{{ __('web.Graphik') }};margin-bottom: 0px;width:30vw;margin-top:45%">
                    {{ __('web.Quilt') }}</h1> <a href="{{ route('categories_items', ['id' => 6]) }}"
                    style="font-family: Graphik!important;display:block;margin-top: 0px!important;font-size:1vw;"
                    class="btn btn-outline-secondary pull-right mr-3">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
        <div class="containerb mb-5 ">
            <img src="{{ asset('build/assets/images/home7.png') }}" style="width:100%;">
            <div class="top-left text-left">
                <h1
                    style="font-weight:500;color:#1e2d51;font-size:2vw;font-family:{{ __('web.Graphik') }};height: 10vh;width:30vw;">
                    <span style="font-size: 40pt;font-family: {{ __('web.BebasNeue-Regular') }};">OUR</span>
                    Blanket collection is your perfect choice for a warm winter. The colorful designs and the fluffy warm
                    material will give you a happy winter.
                </h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:7vw;font-family:{{ __('web.Graphik') }};margin-bottom: 0px;width:30vw;margin-top:40%">
                    Blankets</h1>
                <h1
                    style="font-weight:200;color:#1e2d51;font-size:3vw;font-family:{{ __('web.High-Spirited') }};margin-bottom: 0px;width:30vw;">
                    New Arrivals</h1>
                <a href="{{ route('categories_items', ['id' => 3]) }}"
                    style="font-family: {{ __('web.Graphik') }};display:block;margin-top: 0px!important;font-size:1vw;"
                    class="btn btn-outline-secondary-white pull-right mt-5 ">{{ __('web.LEARN MORE') }}</a>
            </div>
        </div>
    @endif

    </div>
@endsection
