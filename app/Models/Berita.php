<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Secara default Laravel akan menganggap tabelnya adalah 'beritas'.
     */
    protected $table = 'beritas';

    /**
     * Kolom-kolom yang dapat diisi secara massal (Mass Assignable).
     * Pastikan nama kolom di sini sama dengan yang ada di file Migration.
     */
    protected $fillable = [
        'judul',
        'gambar',
        'konten',
        'tanggal_publish',
    ];

    /**
     * Opsional: Jika Anda ingin mengatur format tanggal otomatis.
     */
    protected $casts = [
        'tanggal_publish' => 'date',
    ];
}