<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK (Tanpa Login) ---

// Halaman Utama: Menampilkan berita
Route::get('/', [BeritaController::class, 'indexPublic'])->name('home');

// Halaman Kegiatan Publik
Route::get('/kegiatan-publik', [KegiatanController::class, 'publikIndex'])->name('publik.kegiatan.index');
Route::get('/kegiatan-publik/{id}', [KegiatanController::class, 'publikShow'])->name('publik.kegiatan.show');

// Halaman Statis - Diubah agar mendukung Route Caching di Railway
Route::view('/faq', 'publik.faq')->name('faq');
Route::view('/about', 'publik.about')->name('about');

// Detail Berita Publik
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');


// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- RUTE ADMIN (Grup Middleware Auth) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD Berita
    Route::resource('berita', BeritaController::class);

    // CRUD Kegiatan
    Route::resource('kegiatan', KegiatanController::class);
    
});