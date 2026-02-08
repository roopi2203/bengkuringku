<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// WAJIB: Import class Paginator dari core Laravel
use Illuminate\Pagination\Paginator; 

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Memberitahu Laravel untuk menggunakan gaya Tailwind pada link paginasi
        Paginator::useTailwind();
    }
}