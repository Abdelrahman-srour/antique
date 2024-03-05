<div class="page-wrapper">

    <!-- Preloader -->
    {{-- <div class="preloader"></div> --}}

    <!-- Main Header-->
    <header class="main-header header-style-two ">

        <div class="header-upper web">
            <div class="outer-container">
                <div class="clearfix">
                    <!-- Logo Box -->
                    @if (app()->isLocale('ar'))
                        <div class="pull-right logo-box">
                        @else
                            <div class="pull-left logo-box">
                    @endif
                        <div class="logo"><a href="{{ '/' }}"><img style="height: 100px;width:100%"
                                    src="{{ asset('build/assets/images/logo.png') }}" alt="" title=""></a>
                        </div>
                </div>
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    @if (app()->isLocale('ar'))
                        <nav class="main-menu navbar-expand-md" style="padding-left: 0px;height: 70px;">
                        @else
                            <nav class="main-menu navbar-expand-md" style="padding-right: 0px;height: 70px;">
                    @endif
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            @guest
                                @if (Route::has('login'))
                                    <li style="margin-top: 30px!important; ">
                                        <a style="font-family: {{ __('web.know_us_font') }}; padding-top: 0px!important; padding-bottom: 0px!important;background-color:#C3BD86!important"
                                            href="{{ route('login') }}"
                                            class="theme-btn btn-style-two">{{ __('web.login') }}</a>
                                    </li>
                                    <li><a class="nav-img" href="{{ route('register') }}">
                                            <img src="{{ asset('build/assets/images/new-user.png') }}"
                                                alt=""title="">
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li style="margin-top: 30px!important; "><a
                                        style="padding-top: 0px!important; padding-bottom: 0px!important;background-color:#1f2d51!important"
                                        href=""
                                        onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"
                                        class="theme-btn btn-style-two">{{ __('web.logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                            <li>
                                <a class="nav-img"
                                    href="{{ route('wishlist', ['id' => auth()->user()->id ?? null]) }}">
                                    <img src="{{ asset('build/assets/images/like.png') }}" alt=""
                                        title="">
                                </a>
                            </li>
                            <li>
                                <a class="nav-img" href="{{ route('shopping-cart') }}">
                                    <img src="{{ asset('build/assets/images/bag.png') }}" alt=""
                                        title="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                    <div class="header-style-two .nav-outer .main-menu">
                        <a style="color: #ffffff;font-family:{{ __('web.know_us_font_en') }};"
                            href="{{ route('LangConverter', 'en') }}"><img style="width: 20px;"
                                src="{{ asset('build/assets/images/united-kingdom.png') }}" alt="english">
                            English</a>
                        <span>│</span>
                        <a style="color: #ffffff;font-family:{{ __('web.know_us_font_ar') }};"
                            href="{{ route('LangConverter', 'ar') }}">العربية <img style="width: 20px;"
                                src="{{ asset('build/assets/images/egypt.png') }}" alt="arabic"></a>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="header-upper-mobv pb-1"
    style="padding-top: 6px;box-shadow:0px 0px 15px rgba(0,0,0,0.15);background-color:#C3BD86">
    <div class="container">
        <div class="clearfix">
            <!-- Logo Box -->


            @if (app()->isLocale('ar'))
                <div class="pull-right logo-box">
                @else
                    <div class="pull-left logo-box">
            @endif
            <div class="logo"style="
                        width: 200px;
                    ">
                <a href="{{ '/' }}">
                    <img style="height: 80%; width:80%" src="{{ asset('build/assets/images/logo.png') }}"
                        alt="logo" title="Home">
                </a>
            </div>
        </div>
        <div class="nav-outer clearfix">
            @if (app()->isLocale('ar'))
                <div class="shopping-cart-container"
                    style="position:absolute;z-index: 9999;margin-right: 85%;margin-top:4%;height:18px;width:18px">
                @else
                    <div class="shopping-cart-container"
                        style="position:absolute;z-index: 9999;margin-left: 85%;margin-top:4%;height:18px;width:18px">
            @endif
            <a href="{{ route('shopping-cart') }}">
                <img src="{{ asset('build/assets/images/bag.png') }}" alt="shopping-cart" title="shopping-cart">
            </a>
        </div>
        @if (app()->isLocale('ar'))
            <div class="shopping-cart-container"
                style="position:absolute;z-index: 9999;margin-right: 75%;margin-top:4%;height:18px;width:18px">
            @else
                <div class="shopping-cart-container"
                    style="position:absolute;z-index: 9999;margin-left: 75%;margin-top:4%;height:18px;width:18px">
        @endif
        <a href="{{ route('wishlist', ['id' => auth()->user()->id ?? null]) }}">
            <img src="{{ asset('build/assets/images/like.png') }}" alt="shopping-cart" title="shopping-cart">
        </a>
    </div>
    <!-- Main Menu -->
    <nav class="main-menu">
        <button style="width: 44px;;margin-top:5.5%;" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="navbar-collapse collapse clearfix mt-4" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                @if (app()->isLocale('ar'))
                    <li><a style="color: black;font-family:{{ __('web.know_us_font_en') }}"
                            href="{{ route('LangConverter', 'en') }}"><img style="width: 20px;"
                                src="{{ asset('build/assets/images/united-kingdom.png') }}" alt="english">
                            English</a>
                    </li>
                    @foreach ($categories as $category)
                        <li><a style="font-family:{{ __('web.know_us_font') }}"
                                href="{{ route('categories_items', ['id' => $category->id]) }}">{{ $category->title_ar }}</a>
                        </li>
                    @endforeach
                @else
                    <li><a style="font-family:{{ __('web.know_us_fonta_ar') }}"href="{{ route('LangConverter', 'ar') }}">العربية
                            <img style="width: 20px;" src="{{ asset('build/assets/images/egypt.png') }}"
                                alt="arabic">
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li><a style="font-family:{{ __('web.know_us_font') }}"
                                href="{{ route('categories_items', ['id' => $category->id]) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                @endif
                <li><a style="font-family:{{ __('web.know_us_font') }}"
                        href="{{ route('new-arrivals') }}">{{ __('web.New Arrivals') }}
                    </a></li>
                <li><a style="font-family:{{ __('web.know_us_font') }}"
                        href="{{ route('contact') }}">{{ __('web.Contact us') }}</a></li>
            </ul>
        </div>
    </nav>

</div>
</div>
</div>
</div>
<!--End Header Upper-->
<div class="sticky-header">
    <div class="container clearfix">
        <!--Right Col-->
        @if (app()->isLocale('ar'))
            <div class="left-col pull-left">
            @else
                <div class="right-col pull-right">
        @endif
        <!-- Main Menu -->
        <nav class="main-menu navbar-expand-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="navbarSupportedContent1">
                <ul>
                    <div class="col list-linkk">
                        @if (app()->isLocale('ar'))
                            @foreach ($categories as $category)
                                <li><a style="font-family:{{ __('web.know_us_font') }}"
                                        href="{{ route('categories_items', ['id' => $category->id]) }}">{{ $category->title_ar }}</a>
                                </li>
                            @endforeach
                        @else
                            @foreach ($categories as $category)
                                <li><a style="font-family:{{ __('web.know_us_font') }}"
                                        href="{{ route('categories_items', ['id' => $category->id]) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        @endif
                        <li><a style="font-family:{{ __('web.know_us_font') }}"
                                href="{{ route('new-arrivals') }}">{{ __('web.New Arrivals') }} </a></li>
                        <li><a style="font-family:{{ __('web.know_us_font') }}"
                                href="{{ route('contact') }}">{{ __('web.Contact us') }}</a></li>
                    </div>
                </ul>
            </div>
        </nav><!-- Main Menu End-->
    </div>

</div>
</div>
</header>
<!--End Main Header -->
