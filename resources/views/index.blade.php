@extends('layouts.home_layout')
@section('content')
    <!-- Banner Section one -->
    <section class="banner-section-two parent">
        <div class="image1">
            <img style="width: 100%" src="{{ asset('build/assets/images/_V8A6199.png') }}" alt="">
        </div>
        <div class="image2" style="mix-blend-mode: multiply; position: absolute; top: 0; left: 0; z-index: 1;">
            @if (app()->isLocale('ar'))
                <img style="transform: scaleX(-1);" src="{{ asset('build/assets/images/shadw.png') }}" alt="shadw">
            @else
                <img src="{{ asset('build/assets/images/shadw.png') }}" alt="shadw">
            @endif
        </div>
        @if (app()->isLocale('ar'))
            <div style="writing-mode: vertical-lr;font-weight:10%;color:white;z-index: 3;"
                class="bottom-right text-left GFG">
                <p  style="font-family:{{ __('web.know_us_font') }};font-size:4vw;max-width: 100%;">
                    لمسة فنية
                </p>
                <p  style="font-family:{{ __('web.know_us_font') }};font-size:4vw;max-width: 100%;">
                    في كل تفصيلة
                </p>
            </div>
        @else
            <div style="writing-mode: vertical-lr;font-weight:10%;color:white;z-index: 3;"
                class="bottom-left text-right">
                <p  style="font-family:BebasNeue-Light;font-size:4vw;max-width: 100%;">
                    The
                </p>
                <p  style="font-family:BebasNeue-Bold;font-size:4vw;max-width: 100%;">
                    Egyptian Home
                </p>
                <p  style="font-family:BebasNeue-Light;font-size:4vw;max-width: 100%;">
                    Fabrics & Accessories
                </p>
            </div>
        @endif
    </section>


    <section class="news-section"style=" padding-top: 0px;">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12 text-center mt-5">
                <div class="footer-column row-lg-12 col-md-12 col-sm-12">
                    <div class="footer-widget gallery-widget links-widget">
                        <h4 style="font-family:{{ __('web.know_us_font') }}">{{ __('web.FOLLOW US') }}</h4>
                        <ul class="list-link">
                        </ul>
                        <div class="footer-bottom" style="padding-top: 0%;">
                            <div class="social-column row-lg-12 col-md-12 col-sm-12 "n style="padding-left: 0%;">
                                <ul>
                                    <li class="mt-4"><a
                                            href="https://www.facebook.com/AntiQue.Official.Page?sfnsn=scwspwa&mibextid=2JQ9oc">
                                            <span class="fa-brands fa-facebook fa-2xl"></span></a></li>
                                    <li class="mt-4"><a
                                            href="https://www.instagram.com/antique_home_1?igsh=MXU2dnQ0Y3Jhb3lmMA=="><span
                                                class="fa-brands fa-instagram fa-2xl"></span></a></li>
                                    {{-- <li class="mt-4"><a href="#">
                                        <span class="fa-brands fa-linkedin fa-2xl"></span></a></li>
                                    <li class="mt-4"><a href="#">
                                        <span class="fa-brands fa-twitter fa-2xl"></span></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="font-size: 15pt;background-color:#C3BD86;color:white" class="col-lg-9 col-md-12 col-sm-12">
                <div class="row">
                    <div style="font-family:{{ __('web.know_us_font') }};" class="mr-5 ml-5">
                        <span style="font-size: 40pt;font-family:{{ __('web.know_us_font') }};">Antique</span>
                        {!! __('web.know_us') !!}
                        @if (app()->isLocale('ar'))
                            <a href="{{ route('categories_items', ['id' => 1]) }}"
                                style="font-family:{{ __('web.know_us_font') }};display:block"
                                class="btn btn-outline-secondary pull-left mt-5 ml-5">تـصـفـح الـمـزيـد ...</a>
                        @else
                            <a href="{{ route('categories_items', ['id' => 1]) }}"
                                style="font-family: Graphik!important;display:block"
                                class="btn btn-outline-secondary pull-right mt-5 mr-5">LEARN MORE</a>
                        @endif
                    </div>
                </div>
                @if (app()->isLocale('ar'))
                    <p class=" pull-left mr-2" style="font-family: {{ __('web.Hacen-Promoter-Lt') }};font-size:35pt;">تأسست
                        في عام 1997</p>
                @else
                    <p class=" pull-right mr-2" style="font-family: High-Spirited!important;font-size:35pt;">Founded at 1997
                    </p>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection
