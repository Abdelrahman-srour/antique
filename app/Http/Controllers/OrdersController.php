<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Items_sizes;
use App\Models\Sizes;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve orders with related user data and order items
        $orders = Order::with(['user', 'items', 'coupon'])->get();
        $shipping = Shipping::find(1);

        return view('admin.orders', ['orders' => $orders, 'shipping' => $shipping]);
    }

    public function home()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and process order data from the request
        $validatedData = $request->validate([
            'shipping_address' => 'required|string',
            'Building' => 'required|string',
            'Region' => 'required|string',
            'city' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'required|integer',
            'phone_no2' => 'nullable|integer',
        ]);

        $cart = session('cart', []);
        $totalPrice = 0;
        $totalPrice += session('totalPrice');
        $couponData = session('appliedCoupon', []);
        $couponId = isset($couponData['id']) ? $couponData['id'] : 0;
        $discount = session()->get('discount', 0);
        $Total = ($totalPrice) - $discount;

        // Create a new order instance
        $order = new Order([
            'user_id' => auth()->id(),
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_no' => $validatedData['phone_no'],
            'phone_no2' => $validatedData['phone_no2'],
            'shipping_address' => $validatedData['shipping_address'],
            'Building' => $validatedData['Building'],
            'Region' => $validatedData['Region'],
            'city' => $validatedData['city'],
            'total_price' => $Total,
            'applied_coupon' => $couponId,
            'discount' => $discount,
        ]);

        $order->save();

        session()->forget('appliedCoupon');

        foreach ($cart as $item) {
            // Check if size_id is provided and not null, if not, set it to null

            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'item_price' => $item['item_price'],
            ]);
        }
        session()->forget('cart');

        return view('orderConfirmed')->with('success', 'Order Submitted successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
