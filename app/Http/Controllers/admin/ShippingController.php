<?php

namespace App\Http\Controllers\admin;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $shipping = Shipping::find(1)->get('value');

    return view('shopping-cart', ['shipping' => $shipping]);

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
    public function edit()
    {
        $shipping = Shipping::find(1);

        return view('admin.shipping', ['shipping' => $shipping]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'value' => 'required|integer',
            // add more fields as needed
        ]);

        // Find the shipping record
        $shipping = Shipping::find(1);

        // Update the desired field(s)
        $shipping->value = $request->input('value');
        // update more fields as needed

        // Save the changes
        $shipping->save();

        // Optionally, you can return a response
        return redirect()->back()->with('success', 'Shipping Updated Successfully');
    }


    public function destroy(string $id)
    {
    }
}
