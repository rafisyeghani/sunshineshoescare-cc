<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Retrieve the authenticated user
            $user = Auth::user();

            // Check the role of the user and redirect accordingly
            if ($user->role === 'admin') {
                return view('admin.index');
            } elseif ($user->role === 'user') {
                return view('home');
            }

            // Add more conditions for other roles if needed
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view('auth.login', compact('pageTitle'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
