<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as EventAdminController;

// --- RUTE USER AREA (PENGUNJUNG) ---
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/kontak',  function () { return view('contact'); });
Route::get('/profil',  function () { return view('profil'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/bantuan', function () { return view('bantuan'); });

Route::get('/event-detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout',     [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket',    [EventController::class, 'ticket'])->name('ticket');

// --- RUTE ADMIN AREA (disatukan dalam 1 group) ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions');

    Route::resource('events',     EventAdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners',   PartnerController::class);
});