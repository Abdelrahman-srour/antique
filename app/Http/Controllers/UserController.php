<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', '=', 0)->get();
        return view('admin.users', compact('users'));
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateOwner(Request $request, string $id)
    {
        try {
            $addAdmin = User::where('id', $id)->update([
                'is_admin' => "1",
            ]);

            if ($addAdmin) {
                return redirect()->back()->with('success', 'Account Added To Owners Successfully');
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
    public function updateAdmin(Request $request, string $id)
    {
        try {
            $addAdmin = User::where('id', $id)->update([
                'is_admin' => "2",
            ]);

            if ($addAdmin) {
                return redirect()->back()->with('success', 'Account Added To Admins Successfully');
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
    public function updateModerator(Request $request, string $id)
    {
        try {
            $addAdmin = User::where('id', $id)->update([
                'is_admin' => "3",
            ]);

            if ($addAdmin) {
                return redirect()->back()->with('success', 'Account Added To Moderators Successfully');
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
    public function destroy(string $id)
    {
    }
    // UserController.php

    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function changePassword(Request $request)
    {
        // Validation logic
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password Updated successfully');
    }

}
