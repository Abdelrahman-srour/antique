<?php

namespace App\Http\Controllers\admin;

use App\Models\info;
use App\Models\Items;
use App\Models\Order;
use App\Models\Sizes;
use App\Models\Categories;
use App\Http\Controllers\Controller;


class AdminHomeController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Retrieve orders with related user data and order items
        $orders = Order::with(['user', 'items'])->latest()->take(6)->get();
        $sizes = Sizes::all();
        $categories = Categories::all(); // Replace "Category" with your actual model name
        $counts = [];
        foreach ($categories as $category) {
            $count = Items::where('category_id', $category->id)->count(); // Replace "Item" with your actual model name
            $counts[$category->id] = $count;
        }
        $messages = info::latest()->take(4)->get();
        return view('admin.index', ['orders' => $orders, 'sizes' => $sizes, 'categories' => $categories, 'counts' => $counts, 'messages' => $messages,]);
    }
}
