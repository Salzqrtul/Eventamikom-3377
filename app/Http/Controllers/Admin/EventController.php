<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EventController extends Controller
{
   public function index()
{
    return view('admin.events');
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
