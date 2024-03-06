<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\admin\ItemsController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Laravel Bar
Debugbar::info('info');

Auth::routes();


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('LangConverter');


// Protected Routs
Route::middleware(['auth:web'])->group(function () {
    // Wishlist
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('wishlist.remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');


    // Checkout
    Route::get('orders_info', [CartController::class, 'postCheckout'])->name('orders_info');


    // DASHBOARD home page
    Route::get('admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard.index');


    // caliber price

    //Coupons
    Route::get('admin/dashboard/coupons', [CouponsController::class, 'index'])->name('admin.dashboard.coupons');
    Route::get('admin/dashboard/coupons/create', [CouponsController::class, 'create'])->name('admin.dashboard.coupons.create');
    Route::post('admin/dashboard/coupons/store', [CouponsController::class, 'store'])->name('admin.dashboard.coupons.store');
    Route::get('admin/dashboard/coupons/update/{id}', [CouponsController::class, 'edit'])->name('admin.dashboard.coupon');
    Route::put('admin/dashboard/coupons/update/{id}', [CouponsController::class, 'update'])->name('admin.dashboard.coupon.update');
    Route::put('admin/dashboard/coupons/enable/{id}', [CouponsController::class, 'enable'])->name('admin.dashboard.coupon.enable');
    Route::put('admin/dashboard/coupons/disable/{id}', [CouponsController::class, 'disable'])->name('admin.dashboard.coupon.disable');
    Route::delete('admin/dashboard/coupons/destroy/{id}', [CouponsController::class, 'destroy'])->name('admin.dashboard.coupon.destroy');
    Route::get('admin/dashboard/coupons/apply', [CouponsController::class, 'apply'])->name('admin.dashboard.coupon.apply');


    // Shipping
    Route::get('/shopping-cart', [ShippingController::class, 'index']);
    Route::get('admin/dashboard/shipping', [ShippingController::class, 'edit'])->name('admin.dashboard.shipping');
    Route::put('admin/dashboard/shipping', [ShippingController::class, 'update'])->name('admin.dashboard.shipping.update');


    // side bar items
    Route::get('admin/dashboard/admins', [AdminsController::class, 'index'])->name('admin.dashboard.admins');


    Route::put('admin/dashboard/admins/{id}', [AdminsController::class, 'update'])->name('admin.dashboard.admins.update');
    Route::get('admin/dashboard/change-password', [UserController::class, 'showChangePasswordForm'])->name('admin.dashboard.change.password');
    Route::put('admin/dashboard/change-password/changePassword', [UserController::class, 'changePassword'])->name('admin.dashboard.change.password.changePassword');
    Route::get('admin/dashboard/users', [UserController::class, 'index'])->name('admin.dashboard.users');
    Route::put('admin/dashboard/users/{id}/owner', [UserController::class, 'updateOwner'])->name('admin.dashboard.users.updateOwner');
    Route::put('admin/dashboard/users/{id}/admin', [UserController::class, 'updateAdmin'])->name('admin.dashboard.users.updateAdmin');
    Route::put('admin/dashboard/users/{id}/moderator', [UserController::class, 'updateModerator'])->name('admin.dashboard.users.updateModerator');
    Route::get('admin/layouts/pages-layout', [CategoriesController::class, 'index'])->name('admin.layouts.pages-layout');


    // categories
    Route::get('admin/dashboard/categories', [CategoriesController::class, 'index'])->name('admin.dashboard.categories');
    Route::get('admin/dashboard/categories/create', [CategoriesController::class, 'create'])->name('admin.dashboard.categories.create');
    Route::post('admin/dashboard/categories', [CategoriesController::class, 'store'])->name('admin.dashboard.categories.store');
    Route::get('admin/dashboard/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.dashboard.categories.edit');
    Route::put('admin/dashboard/categories/{id}', [CategoriesController::class, 'update'])->name('admin.dashboard.categories.update');
    Route::delete('admin/dashboard/categories/{id}', [CategoriesController::class, 'destroy'])->name('admin.dashboard.categories.destroy');


    // categories_items
    Route::get('admin/dashboard/items{id}', [ItemsController::class, 'index'])->name('admin.dashboard.items');
    Route::get('admin/dashboard/items/create', [ItemsController::class, 'create'])->name('admin.dashboard.items.create');
    Route::post('admin/dashboard/items', [ItemsController::class, 'store'])->name('admin.dashboard.items.store');
    Route::get('admin/dashboard/items/edit/{id}', [ItemsController::class, 'edit'])->name('admin.dashboard.items.edit');
    Route::put('admin/dashboard/items/{id}', [ItemsController::class, 'update'])->name('admin.dashboard.items.update');
    Route::delete('admin/dashboard/items/{id}', [ItemsController::class, 'destroy'])->name('admin.dashboard.items.destroy');
    Route::get('admin/dashboard/items/category/{id}', [ItemsController::class, 'categoriesIndex'])->name('items.categories_items');
    Route::get('admin/dashboard/items/update/{id}', [ItemsController::class, 'ShowAdmin']);


    // contact
    Route::get('admin/dashboard/contact', [ContactController::class, 'index'])->name('admin.dashboard.contact');


    // orders
    Route::get('admin/dashboard/orders', [OrdersController::class, 'index'])->name('admin.dashboard.orders');
});


// Auth routs

//Home
Route::get('/', [HomePageController::class, 'index'])->name('home.page');


// view items
Route::get('categories_items/{id}', [ItemsController::class, 'categoriesHome'])->name('categories_items');

Route::get('item_details/{id}', [ItemsController::class, 'show'])->name('item_details');
Route::get('items', [ItemsController::class, 'index'])->name('items');
Route::get('new-arrivals', [ItemsController::class, 'newArrivals'])->name('new-arrivals');


Route::get('admin/dashboard/coupons/apply', [CartController::class, 'apply'])->name('admin.dashboard.coupon.apply');


// cart
Route::get('shopping-cart', [CartController::class, 'index'])->name('shopping-cart');

Route::get('add-to-cart/{id}', [CartController::class, 'addItemtoCart'])->name('addToCart');

Route::get('deleteItem/{id}', [CartController::class, 'deleteItem'])->name('deleteItem');


Route::get('orderConfirmed', function () {
    return view('orderConfirmed');
});


// Headers
Route::get('categories', [CategoriesController::class, 'home'])->name('categories');


// about us


// contact us
Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


// orders
Route::post('orders_info', [OrdersController::class, 'store'])->name('orders.store');
