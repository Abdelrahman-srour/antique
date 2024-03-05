<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\info;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Info::all();
        return view('admin.contact', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Info $info)
    {
        {
            $request->validate([
                'full_name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

            $store = new Info([
                'full_name' => $request->get('full_name'),
                'email' => $request->get('email'),
                'message' => $request->get('message'),
            ]);

            if ($store->save()) {
                return redirect()->route('contact', ['info' => $info])->with('success', 'Message sent successfully');
            } else {
                return redirect()->route('contact', ['info' => $info])->with('failed', 'something went wrong');
            }
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
