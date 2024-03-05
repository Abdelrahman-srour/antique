@extends('layouts.mainlayout')
@section('content')
    <!-- items Section -->
    <section class="contact-page-section mt-5 mb-5">
        <div class="map-section">
            <!--Map Outer-->
        </div>
        <div class="container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Info Column -->
                    <div class="info-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">

                            @if (app()->isLocale('ar'))
                                <div style="font-family:{{ __('web.know_us_font') }}" class="text">
                                    {{ __('web.contact') }}
                                </div>
                            @else
                                <div style="font-family:{{ __('web.know_us_font') }}" class="text">
                                    {{ __('web.contact') }}
                                </div>
                            @endif
                            <ul class="list-style-six">
                                @if (app()->isLocale('ar'))
                                    <li style="font-family:{{ __('web.know_us_font') }}"><span
                                            class="icon fa fa-building"></span> مجمع 52 في الوحدة 54 <br> المنطقة الصناعية
                                        ,<br> جنوب بورسعيد,
                                    @else
                                    <li style="font-family:{{ __('web.know_us_font') }}"><span
                                            class="icon fa fa-building"></span> Unit 52 in Complex 54 Factory, <br>
                                        Industrial Zone, <br> South Port Said
                                @endif
                                </li>
                                {{-- <li><span class="icon fa fa-fax"></span> +1 617 572 2000</li> --}}
                                @if (app()->isLocale('ar'))
                                    <li style="font-family:{{ __('web.know_us_font_ar') }}"><span
                                            class="icon fa fa fa-mobile"></span> 677 7710 121 20+</li>
                                @else
                                    <li style="font-family:{{ __('web.know_us_font_en') }}"><span
                                            class="icon fa fa fa-mobile"></span> +20 121 0177 776</li>
                                @endif
                                <li style="font-family:{{ __('web.know_us_font_en') }}"><span
                                        class="icon fa fa-envelope-o"></span>info@antique.eg</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Form Column -->
                    <div class="form-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <div class="contact-form">
                                <form method="post" action="{{ route('contact.store') }}" id="contact-form">
                                    @method('post')
                                    @csrf

                                    <div class="form-group ">
                                        <input type="text" name="full_name" value=""
                                            placeholder="{{ __('web.Full name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="email" value=""
                                            placeholder="{{ __('web.Email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" required placeholder="{{ __('web.write..') }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input value="{{ __('web.Send') }}"
                                            style="font-family:{{ __(__('web.know_us_font_en')) }};" type="submit"
                                            class="theme-btn btn-style-two ">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
