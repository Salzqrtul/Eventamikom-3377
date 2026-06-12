<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\TransactionController; // <-- Dipakai pada Modul 10

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/kontak',   function () { return view('contact'); });
Route::get('/profil',   function () { return view('profil'); });
Route::get('/katalog',  function () { return view('katalog'); });
Route::get('/bantuan',  function () { return view('bantuan'); });

Route::get('/event-detail', [EventController::class, 'show'])->name('events.show');
Route::get('/my-ticket',    [EventController::class, 'ticket'])->name('ticket');

// --- RUTE CHECKOUT (Modul 10) ---
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
// ------------------------------------------

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::redirect('/admin', '/admin/login');

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Menggunakan proteksi ganda 'auth' dan 'admin' sesuai standar keamanan modul
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // --- SESUAI MODUL 10: Mengarahkan menu Transaksi Admin ke TransactionController ---
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');

        // Resource Routes
        Route::resource('events',     EventAdminController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners',   PartnerController::class);
    });

});

// --- RUTE RAHASIA UNTUK ISI DATABASE DI LARAVEL CLOUD ---
Route::get('/gas-seed', function () {
    try {
        // Cek apakah admin sudah ada
        $adminAda = \App\Models\User::where('email', 'admin@amikom.ac.id')->exists();
        
        if (!$adminAda) {
            \App\Models\User::create([
                'name' => 'Administrator',
                'email' => 'admin@amikom.ac.id',
                'password' => bcrypt('password'), 
                'role' => 'admin', // Memastikan field role terisi agar lolos middleware 'admin'
            ]);
            return "Mantap! Akun admin@amikom.ac.id berhasil dimasukkan ke Database Cloud.";
        }
        
        return "Akun admin sudah ada di database cloud kamu.";
    } catch (\Exception $e) {
        return "Waduh error: " . $e->getMessage();
    }
});