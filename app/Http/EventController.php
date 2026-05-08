<?php

namespace App\Http\Controllers; // <-- UBAH BAGIAN INI (Hapus \Admin)

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events'); // Catatan: pastikan view ini memang untuk public jika ini controller public
    }

    public function show()
    {
        return view('event-detail');
    }

    public function checkout()
    {
        return view('checkout'); 
    }
}