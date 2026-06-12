<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $partners   = Partner::all();
        $categories = Category::all();
        return view('welcome', compact('partners', 'categories'));
    }
}