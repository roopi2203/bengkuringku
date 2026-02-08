<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data untuk ditampilkan di kotak statistik
        $totalBerita = Berita::count();
        $totalKegiatan = Kegiatan::count();
        
        // Mengambil 5 berita terbaru untuk tabel ringkasan di dashboard
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalKegiatan', 'beritaTerbaru'));
    }
}