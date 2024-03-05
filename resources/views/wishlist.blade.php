@extends('layouts.mainlayout')
@section('content')
    <section style="min-height: 525px" class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div style="margin-top: 10%; " class="col-10 ">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($wishlistItems->isEmpty())
                        <div class="card rounded-3 mb-4 d-flex align-items-center">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between text-center">
                                    <p style="font-family: {{__('web.Your Wishlist is Empty.font')}}" class="text-center">{{__('web.Your Wishlist is Empty.')}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($wishlistItems as $wishlist)
                            <div class="card rounded-4 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <a href="{{ route('item_details', ['id' => $wishlist->items->id]) }}"><img
                                                    src="{{ asset($wishlist->items->image_one) }}"
                                                    class="img-fluid rounded-3" alt=""></a>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">
                                                <a style="font-family:{{__('web.item_title_font')}};display: inline;" href="{{ route('item_details', ['id' => $wishlist->items->id]) }}">
                                                    {{ __('web.item_title', ['title' => app()->isLocale('ar') ? $wishlist->items->title_ar : $wishlist->items->title]) }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h4 style="font-family:{{__('web.item_details_font')}};padding-right: 10px;padding-left: 10px;padding-top: 5px;padding-bottom: 5px;font-size:15px"
                                                class="price theme-btn style-two text-hover">EGP
                                                {{ $formattedNumber = (int) $wishlist->items->item_price }}</h4>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{ route('wishlist.remove', ['id' => $wishlist->id]) }}"
                                                class="text-danger">
                                                <i class="fas fa-trash fa-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
