<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\EventController as EventAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/kontak',   function () { return view('contact'); });
Route::get('/profil',   function () { return view('profil'); });
Route::get('/katalog',  function () { return view('katalog'); });
Route::get('/bantuan',  function () { return view('bantuan'); });

Route::get('/event-detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout',     [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket',    [EventController::class, 'ticket'])->name('ticket');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


Route::prefix('admin')->name('admin.')->group(function () {
    
    // 1. Rute Login (Bisa diakses tanpa login / Guest)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // 2. Rute Protected (Wajib Login & Punya Akses Admin)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('transactions', [DashboardController::class, 'transactions'])->name('transactions');

        // Resource Routes
        Route::resource('events',     EventAdminController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners',   PartnerController::class);
    });

});