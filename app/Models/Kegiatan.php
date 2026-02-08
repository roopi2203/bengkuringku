<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Secara default Laravel akan menganggap tabelnya adalah 'kegiatans'.
     */
    protected $table = 'kegiatans';

    /**
     * Kolom-kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'jam_pelaksanaan', // Tambahkan ini
        'lokasi',           // Tambahkan ini
        'deskripsi',
        
    ];

    /**
     * Opsional: Melakukan casting pada kolom tanggal agar mudah dimanipulasi.
     */
    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];
}