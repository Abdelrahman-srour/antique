<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupons::all();
        return view('admin.coupon.index')->with('coupons', $coupons);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'coupon_code' => 'required|unique:coupons,coupon_code',
                'amount' => 'required|integer',
                'expiry_date' => 'required',
                'coupon_type' => 'required|integer',
            ]);

            $store = Coupons::create([
                'coupon_code' => $request->get('coupon_code'),
                'amount' => $request->get('amount'),
                'expiry_date' => $request->get('expiry_date'),
                'status' => '0',
                'coupon_type' => $request->get('coupon_type'),
            ]);

            if ($store) {
                return redirect()->back()->with('success', 'Coupon Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
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
    public function edit(Coupons $id)
    {
        return view('admin.coupon.update', ['coupons' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupons $id)
    {
        try {
            $request->validate([
                'coupon_code' => 'required|unique:coupons,coupon_code,' . $id->id,
                'amount' => 'required|integer',
                'expiry_date' => 'required|date', // Ensure expiry_date is a valid date format
                'coupon_type' => 'required|integer',
            ]);

            $expiryDate = $request->get('expiry_date');
            $today = now()->format('Y-m-d');

            // Check if the expiry date is less than today's date
            if ($expiryDate < $today) {
                // If the expiry date is earlier than today, set status to 0
                $status = 0;
            } else {
                // Otherwise, use the existing status
                $status = $id->status;
            }

            $id->update([
                'coupon_code' => $request->get('coupon_code'),
                'amount' => $request->get('amount'),
                'expiry_date' => $expiryDate,
                'coupon_type' => $request->get('coupon_type'),
                'status' => $status,
            ]);

            if ($id) {
                return redirect()->back()->with('success', 'Coupon Updated');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
    public function enable($id)
    {
        $coupon = Coupons::find($id);

        if ($coupon) {
            // Check if today's date is greater than the expiry date
            if (now()->format('Y-m-d') > $coupon->expiry_date) {
                // If expired, set status to 0
                $coupon->status = 0;
                $coupon->save();
                return redirect()->back()->with('error', 'Coupon has expired and cannot be enabled.');
            } else {
                // Otherwise, enable the coupon
                $coupon->status = 1;
                $coupon->save();
                return redirect()->back()->with('success', 'Coupon Enabled');
            }
        } else {
            return redirect()->back()->with('error', 'Coupon Not Found');
        }
    }
    public function disable($id)
    {
        $disable = Coupons::find($id);

        if ($disable) {
            $disable->status = 0;
            $disable->save();

            return redirect()->back()->with('success', 'Coupon disabled');
        } else {
            return redirect()->back()->with('error', 'Coupon Not Found');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupons $id)
    {
        $id->delete();
        if ($id) {
            return redirect()->back()->with('success', 'Coupon Deleted Successfully');
        }
    }
}
