<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Menampilkan halaman formulir login (Sesuai Bab 8.4)
    public function showLogin() 
    {
        return view('auth.login');
    }

    // 2. Memproses submit Log In (Sesuai Bab 8.4)
    public function login(Request $request) 
    {
        // Validasi input data dari form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Autentikasi mencocokkan credentials ke database menggunakan Bcrypt bawaan Laravel
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Diarahkan langsung ke rute dashboard admin pasca-auth sukses
            return redirect()->route('admin.dashboard'); 
        }

        // Jika gagal, dikembalikan ke halaman login dengan pesan error (Sesuai Tugas No. 3 Halaman 73)
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda berikan tidak terdaftar di database kami.',
        ])->onlyInput('email');
    }

    // 3. Memproses Log Out / Keluar (Sesuai Bab 8.4)
    public function logout(Request $request) 
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}