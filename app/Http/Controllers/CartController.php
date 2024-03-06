<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Coupons;
use App\Models\Shipping;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        // $discountAmount = 0;
        // $couponCode = request('coupon_code');
        // $discountAmount = Coupons::where('amount', $couponCode)->first();

        return view("shopping-cart",);
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
        //
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
    public function addItemtoCart(Request $request, $id)
    {
        $cartitems = Items::findOrFail($id);
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        $shipping = Shipping::find(1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $sizeId = $cartitems->sizes ? $cartitems->sizes->size_value : 0;

            $cart[$id] = [
                "id" => $cartitems->id,
                "image_one" => $cartitems->image_one,
                "title" => $cartitems->title,
                "title_ar" => $cartitems->title_ar,
                "disc" => $cartitems->disc,
                "disc_ar" => $cartitems->disc_ar,
                "item_price" => $cartitems->item_price,
                "length" => $cartitems->length,
                "width" => $cartitems->width,
                "size_id" => $sizeId,
                "quantity" => 1,
            ];
        }
        // Calculate the total price and total commission for all items in the cart
        foreach ($cart as $item) {
            $totalPrice += $item['quantity'] * $item['item_price'];
        }

        // Calculate the discounted total price based on the applied coupon
        $appliedCoupon = session()->get('appliedCoupon');
        $discount = session()->get('discount', 0);

        $discountedTotalPrice = $totalPrice - $discount;

        // Store the total price, total commission, discounted total price, and cart in the session
        session()->put('appliedCoupon', $appliedCoupon);
        session()->put('totalPrice', $totalPrice + $shipping->value);
        session()->put('discountedTotalPrice', $discountedTotalPrice);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item has been added to the cart!');
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully.');
            } else {
                session()->flash('error', 'Item not found in the cart.');
            }
        } else {
            session()->flash('error', 'Invalid request.');
        }

        return redirect()->back();
    }


    public function deleteItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                // Calculate the price of the item to be removed
                $itemPrice = $cart[$request->id]['quantity'] * $cart[$request->id]['item_price'];

                unset($cart[$request->id]);

                // Recalculate the total price
                $totalPrice = 0;
                foreach ($cart as $item) {
                    $totalPrice += $item['quantity'] * $item['item_price'];
                }

                // Store the updated cart and total price in the session
                session()->put('cart', $cart);
                session()->put('totalPrice', $totalPrice);

                // Handle the case when the cart becomes empty
                if (empty($cart)) {
                    session()->forget(['totalPrice', 'discountedTotalPrice', 'appliedCoupon']);
                }
            }

            return redirect()->back()->with('success', 'Item has been deleted');
        }
    }


    public function postCheckout()
    {
        session()->forget('discountedPrice');
        return view('orders_info');
    }
    private function checkCoupon($couponCode)
    {
        // dd($couponCode); // Comment out or remove this line
        $checkCoupon = Coupons::where('coupon_code', $couponCode)
        ->where('expiry_date', '>', now()) // Use now() instead of Coupons::now()
        ->where('status', 1)
            ->first();

        return $checkCoupon;
    }

    public function apply(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $coupon = $this->checkCoupon($couponCode);

        if ($coupon) {
            // Get the coupon type from the coupon object
            $couponType = $coupon->coupon_type;

            // Assuming you have total price stored in the session
            $totalPrice = session()->get('totalPrice', 0);

            if ($couponType === 1) {
                // If coupon type is fixed amount
                $discount = $coupon->amount;
            } elseif ($couponType === 2) {
                // If coupon type is percentage
                $discount = ($totalPrice * $coupon->amount) / 100;
            }

            // Calculate the discounted total price
            $discountedTotalPrice = $totalPrice - $discount;

            // Store the applied coupon, total commission, and discounted total price in the session
            session()->put('discount', $discount);
            session()->put('appliedCoupon', $coupon);
            session()->put('discountedTotalPrice', $discountedTotalPrice);

            return redirect()->back()->with('Applied', 'Coupon Applied Successfully');
        } else {
            // If coupon is not valid, remove the applied coupon and related data from the session
            session()->forget(['appliedCoupon', 'discountedTotalPrice', 'discount']);

            // Redirect with error message
            return redirect()->back()->with('error', 'Invalid Coupon');
        }
    }
}
