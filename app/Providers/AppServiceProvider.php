<?php

namespace App\Providers;

use App\Models\Sets;
use App\Models\User;
use App\Models\Items;
use App\Models\Order;
use App\Models\Sizes;
use App\Models\Calibers;
use App\Models\Wishlist;
use App\Models\Categories;
use App\Models\Collections;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Shipping;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('categories', Categories::all()->where('status', '=', 1));
        });
        view()->composer('admin/orders', function ($view) {
            $view->with('last3', Order::with(['user', 'items'])->latest()->take(3)->get());
        });
        view()->composer('*', function ($view) {
            $view->with('items', Items::all()->where('status', '=', 1));
        });
        view()->composer('*', function ($view) {
            $view->with('sizes', Sizes::all());
        });
        view()->composer('*', function ($view) {
            $view->with('shipping', Shipping::find(1));
        });
    }
}
