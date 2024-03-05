@extends('layouts.mainlayout')
@section('content')
    <!-- items Section -->
    <section class="news-section mt-5">
        <div class="container">
            <div class="row clearfix">
                @foreach ($items as $item)
                    <?php
                    // Convert created_at to a DateTime object
                    $createdAt = new DateTime($item->created_at);

                    // Calculate the difference in days between the current date and the creation date
                    $daysDifference = (new DateTime())->diff($createdAt)->days;

                    // Show the "New" badge if the item is less than or equal to 30 days old
                    $showNewBadge = $daysDifference <= 30;
                    ?>
                    <div class="text-center news-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="img-magnifier-container">
                                @if ($showNewBadge)
                                                                        <span style="font-family: Adam-Bold!important;font-size: 12pt;color:#cf9d63!important;z-index: 999;"
                                        class="top-left badge">{{__('web.New')}}</span>

                                @endif
                                <img id="myimage" src="{{ asset($item->image_one) }}" alt="">
                            </div>
                        </div>
                        @if (app()->isLocale('ar'))

                        <h3 class="mt-1">{{ $item->title_ar }}</h3>
                        @else

                        <h3 class="mt-1">{{ $item->title }}</h3>
                        @endif
                        <h5 style="font-family:Adam-Bold!important;">EGP {{ $item->item_price }}</h5>
                        <a style="font-family:{{__('web.View_font')}};" href="{{ route('item_details', ['id' => $item->id]) }}"
                            class="theme-btn btn-style-two">{{__('web.View')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- End items Section -->
    <!-- Banner Section Two -->
    <div class="containerb">
        <img src="{{ asset('build/assets/images/home5.webp') }}" style="width:100%;">
        <div class="bottom-left text-right">
            <h1
                style="font-weight:500;color:rgb(255, 255, 255);font-size:6vw;font-family:Handel_Becker_Bold!important;margin-bottom: 0px;height: 6vw;">
                {{__('web.NECKLACE')}}
            </h1>
            <h1 style="font-weight:200;color:#d5aa6d;font-size:6vw;font-family:Adam-Bold!important;margin-bottom: 0px;">
                {{__('web.PIECES')}}</h1>
            <a style="padding:2vw;font-family:Adam-Bold!important;" href="{{ route('categories_items', ['id' => 3]) }}"
                class="theme-btn btn-style-two-i">{{__('web.Shop Now')}}</a>
        </div>

    </div>
@endsection
