<?php

namespace App\Http\Controllers\admin;

use App\Models\Items;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Validators\ValidationException;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = items::all()->where('status', '=', 1);


        return view('items', compact('items'));
    }

    public function categoriesIndex($id)
    {
        $category = Categories::all();

        if (!$category) {
            return abort(404);
        }
        return view('admin.items.index', compact('category'));
    }


    public function categoriesHome($id, Request $request)
    {
        $category = Categories::find($id);
        $smallItem = Items::select(DB::raw('MIN(CAST(item_price AS DECIMAL(10, 2))) AS min_price'))->first()->min_price;
        $largeItem = Items::select(DB::raw('MAX(CAST(item_price AS DECIMAL(10, 2))) AS max_price'))->first()->max_price;

        // Validate the request data
        $validatedData = $request->validate([
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
        ]);

        $minPrice = $validatedData['min_price'] ?? 100; // Default to 100 if null
        $maxPrice = $validatedData['max_price'] ?? null;

        $categories_items = items::all()
            ->where('category_id', $id)
            ->where('status', '=', 1);

        // Apply validated min and max prices to the query
        $categories_items->where('item_price', '>=', $minPrice);

        if ($maxPrice !== null) {
            $categories_items->where('item_price', '<=', $maxPrice);
        }


        return view('categories_items', compact('categories_items', 'category', 'minPrice', 'maxPrice', 'smallItem', 'largeItem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Items $item)
    {
        try {
            $request->validate([
                'image_one' => 'required|image|mimes:jpeg,png,jpg|max:6048',
                'image_two' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'image_three' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'image_four' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'title' => 'required',
                'title_ar' => 'required',
                'disc' => 'required',
                'disc_ar' => 'required',
                'category_id' => 'required|integer',
                'item_price' => 'required',
                'length' => 'nullable|integer',
                'width' => 'nullable|integer',
                'size_id' => 'nullable|integer',
            ]);
            $image_one = $request->file('image_one');
            $image_two = $request->file('image_two');
            $image_three = $request->file('image_three');
            $image_four = $request->file('image_four');
            $path = 'build/assets/images/';

            $filename1 = $path . time() . '1' . '.' . $image_one->getClientOriginalExtension();
            $filename2 = $image_two ? $path . time() . '2' . '.' . $image_two->getClientOriginalExtension() : null;
            $filename3 = $image_three ? $path . time() . '3' . '.' . $image_three->getClientOriginalExtension() : null;
            $filename4 = $image_four ? $path . time() . '4' . '.' . $image_four->getClientOriginalExtension() : null;

            if ($image_one) {
                move_uploaded_file($image_one->getPathname(), $filename1);
            }
            if ($image_two) {
                move_uploaded_file($image_two->getPathname(), $filename2);
            }
            if ($image_three) {
                move_uploaded_file($image_three->getPathname(), $filename3);
            }
            if ($image_four) {
                move_uploaded_file($image_four->getPathname(), $filename4);
            }

            $store = new Items([
                'image_one' => $filename1,
                'image_two' => $filename2,
                'image_three' => $filename3,
                'image_four' => $filename4,
                'title' => $request->get('title'),
                'title_ar' => $request->get('title_ar'),
                'disc' => $request->get('disc'),
                'disc_ar' => $request->get('disc_ar'),
                'category_id' => $request->get('category_id'),
                'item_price' => $request->get('item_price'),
                'length' => $request->get('length'),
                'width' => $request->get('width'),
                'size_id' => $request->get('size_id'),
                'status' => '1',
            ]);
            $store->save();

            if ($item) {
                return redirect()->back()->with('success', 'Item Added Successfully');
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
    public function show($id)
    {

        $item = Items::findOrFail($id);

        return view('item_details', ['item' => $item]);
    }
    public function ShowAdmin($id)
    {

        $item = Items::findOrFail($id);

        return view('admin.items.update', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $id)
    {
        return view('admin.items.update', ['item' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $id)
    {
        try {
            $request->validate([
                'image_one' => 'image|mimes:jpeg,png,jpg|max:6048',
                'image_two' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'image_three' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'image_four' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
                'title' => 'required',
                'title_ar' => 'required',
                'disc' => 'required',
                'disc_ar' => 'required',
                'category_id' => 'required|integer',
                'item_price' => 'required',
                'length' => 'nullable|integer',
                'width' => 'nullable|integer',
                'size_id' => 'nullable|integer',
            ]);
            $image_one = $request->file('image_one');
            $image_two = $request->file('image_two');
            $image_three = $request->file('image_three');
            $image_four = $request->file('image_four');
            $path = 'build/assets/images/';

            $filename1 = $image_one ? $path . time() . '1' . '.' . $image_one->getClientOriginalExtension() : $id->image_one;
            $filename2 = $image_two ? $path . time() . '2' . '.' . $image_two->getClientOriginalExtension() : $id->image_two;
            $filename3 = $image_three ? $path . time() . '3' . '.' . $image_three->getClientOriginalExtension() : $id->image_three;
            $filename4 = $image_four ? $path . time() . '4' . '.' . $image_four->getClientOriginalExtension() : $id->image_four;

            if ($image_one) {
                move_uploaded_file($image_one->getPathname(), $filename1);
            }

            if ($image_two) {
                move_uploaded_file($image_two->getPathname(), $filename2);
            }

            if ($image_three) {
                move_uploaded_file($image_three->getPathname(), $filename3);
            }
            if ($image_four) {
                move_uploaded_file($image_four->getPathname(), $filename4);
            }
            $id->update([
                'image_one' => $filename1,
                'image_two' => $filename2,
                'image_three' => $filename3,
                'image_four' => $filename4,
                'title' => $request->get('title'),
                'title_ar' => $request->get('title_ar'),
                'disc' => $request->get('disc'),
                'disc_ar' => $request->get('disc_ar'),
                'category_id' => $request->get('category_id'),
                'item_price' => $request->get('item_price'),
                'length' => $request->get('length'),
                'width' => $request->get('width'),
                'size_id' => $request->get('size_id'),
                'status' =>  $id->status,
            ]);

            if ($id) {
                return redirect()->back()->with('success', 'Item Updated Successfully');
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
     * Remove the specified resource from storage.
     */
    public function destroy(Items $id)
    {
        $id->delete();
        if ($id) {
            return redirect()->back()->with('success', 'Item Successfully Deleted');
        }
    }

    public function newArrivals()
    {
        $nv = DB::table('items')
            ->orderBy('id')
            ->limit(12)
            ->where('status', '=', 1)->get();


        return view('new-arrivals', compact('nv'));
    }
}
