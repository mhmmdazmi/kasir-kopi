<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        // Otentikasi berhasil, arahkan ke halaman dashboard
        return redirect()->route('dashboard');
    } else {
        // Otentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->route('login')->with('error', 'Email atau password salah');
    }
}
    public function logout(Request $request)
    {
        Auth::logout(); // Hapus sesi pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }
}
