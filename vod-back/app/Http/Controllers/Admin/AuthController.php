<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function LoginForm()
    {
        return view('admin.login');
    }

    public function LoginAttempt(Request $request)
    {
        $email     = $request->get('email');
        $password  = $request->get('password');

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'role' => 1])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withErrors(['Wrong email or password']);
        }
    }

    public function LogOut()
    {
        Session::flush();
        Auth::guard('web')->logout();

        return redirect()->route('admin.login');
    }
}
