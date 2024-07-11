<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        $data = [
            'title' => 'Login',
        ];

        return view('auth.login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];

        return view('auth.register', $data);
    }

    public function store_login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin/overview')->with('success', 'Login Berhasil.');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login')->with('success', 'Anda telah berhasil logout.');
    }
}
