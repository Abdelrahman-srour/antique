@extends('layouts.mainlayout')
@section('content')
    <!-- categories Section -->
    <section style="margin-top: 8%" class="news-section mb-5">
        <div class="container">
            <div class="row clearfix">
                @foreach ($nv as $item)
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
                            <div class="image">
                                @if ($showNewBadge)
                                    <span style="font-family: Adam-Bold!important;font-size: 12pt;color:#d5d1aa!important;z-index: 999;"
                                        class="top-left badge">{{__('web.New')}}</span>
                                @endif
                                <img src="{{ asset($item->image_one) }}" alt="">
                            </div>
                        </div>
                        @if (app()->isLocale('ar'))

                        <h5 class="mt-1">{{ $item->title_ar }}</h5>
                        @else

                        <h5 class="mt-1">{{ $item->title }}</h5>
                        @endif
                        <h3 class="demo"
                            style="font-family:{{__('web.Adam-Bold')}};margin-bottom: 0px;color:black;font-size:16px">
                            EGP {{ $formattedNumber = (int) $item->item_price }}</h3>
                        <a style="font-family:{{__('web.View_font')}};" href="{{ route('item_details', ['id' => $item->id]) }}"
                            class="theme-btn btn-style-two">{{__('web.View')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
