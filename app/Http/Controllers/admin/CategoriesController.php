<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Summary of CategoriesController
 */
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();

        return view('admin.layouts.pages-layout', compact('categories'));
    }
    public function home()
    {
        $categories = Categories::all()->where('status', '=', 1);

        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
        ]);

        $store = new Categories([
            'title' => $request->get('title'),
            'title_ar' => $request->get('title_ar'),
            'status' => '1',
        ]);

        // Save the category.
        $store->save();
        if ($store) {
            return redirect()->route('admin.dashboard.categories.create')->with('success', 'Category Added Successfully');
        } elseif ($store == false) {
            return redirect()->route('admin.dashboard.categories.create',)->with('failed', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::findOrFail($id);

        return view('admin.categories.update', ['id' => $id]);
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
