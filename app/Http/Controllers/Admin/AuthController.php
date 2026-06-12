<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Fungsi menampilkan halaman view formulir
    public function showLogin() {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    // 2. Fungsi memproses validasi Submit Log In
    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek manual data user di database
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar di database kami.'])->onlyInput('email');
        }

        // Cek kecocokan password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Password yang Anda masukkan salah.'])->onlyInput('email');
        }

        // PAKSA LOGIN & BYPASS (Menghindari gangguan session/middleware)
        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->route('admin.dashboard');
    }

    // 3. Fungsi memroses Log Out (Keluar)
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}