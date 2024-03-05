<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $isAdmin = $user->is_admin;

        if ($isAdmin === 1) {
            return redirect('admin/dashboard');
        } elseif ($isAdmin === 2) {
            // Redirect users with is_admin = 0 to the home route
            return redirect('admin/dashboard');
        } else {
            // For any other cases, redirect to the admin dashboard
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
