<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = auth()->user()->role;

            // HAPUS intended secara paksa
            $request->session()->forget('url.intended');

            if ($role === 'admin') {
                return redirect('/admin');
            }

            if ($role === 'customer') {
                return redirect('/customer');
            }

            Auth::logout();
            return redirect('/login');
        }

        return back()->with('error', 'Email atau password salah');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
