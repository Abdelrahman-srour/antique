<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Wishlist;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlistItems = Wishlist::with(['user', 'items'])->get();

        return view('wishlist', ['wishlistItems' => $wishlistItems]);

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
    public function store(Items $id)
    {
        $user = auth()->user();

        // Check if the item is already in the user's wishlist
        $existingWishlistItem = Wishlist::where('user_id', $user->id)
            ->where('item_id', $id->id)
            ->first();

        if ($existingWishlistItem) {
            // The item is already in the wishlist
            return redirect()->back()->with('error', 'Item already added to your Wishlist!');
        }

        // If not in the wishlist, add the item
        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->item_id = $id->id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Item Added to your Wishlist!');
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
    public function destroy(Wishlist $id)
    {
        $id->delete();

        return redirect()->back()->with('success', 'Item has been Removed from Wishlist!');
    }
}
