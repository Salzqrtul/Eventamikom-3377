<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

// --- PERBAIKAN IMPORT ---
// 1. Import EventController untuk User/Public
use App\Http\Controllers\EventController; 
// 2. Import EventController untuk Admin dan beri alias EventAdminController
use App\Http\Controllers\Admin\EventController as EventAdminController;


// --- RUTE USER AREA (PENGUNJUNG) ---
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/kontak', function(){ return view('contact'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/bantuan', function () { return view('bantuan'); });

// Rute Detail & Checkout (DIBUAT STATIS SUPAYA TIDAK ERROR ID)
// Sekarang ini benar-benar memanggil EventController public
Route::get('/event-detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// --- RUTE ADMIN AREA ---
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // URL: /admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // URL: /admin/events-detail
    // PERBAIKAN: Gunakan EventAdminController untuk rute admin
    //Route::get('/event-detail', [EventAdminController::class, 'index'])->name('events');

    // URL: /admin/transactions
    Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions'); 
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventAdminController::class);
});