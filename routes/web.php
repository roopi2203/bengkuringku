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

// Halaman Kegiatan Publik (Menggunakan fungsi yang mendukung filter & paginasi)
Route::get('/kegiatan-publik', [KegiatanController::class, 'publikIndex'])->name('publik.kegiatan.index');
Route::get('/kegiatan-publik/{id}', [KegiatanController::class, 'publikShow'])->name('publik.kegiatan.show');

// Halaman Statis
Route::get('/faq', function () {
    return view('publik.faq');
})->name('faq');

Route::get('/about', function () {
    return view('publik.about');
})->name('about');

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

    // CRUD Kegiatan (Otomatis menggunakan fungsi index, create, store, edit, update, destroy)
    Route::resource('kegiatan', KegiatanController::class);
    
});