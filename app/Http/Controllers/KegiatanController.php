<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Tampilan untuk publik (Daftar Kegiatan dengan Filter & Paginasi)
     */
    public function publikIndex(Request $request)
    {
        $query = Kegiatan::orderBy('tanggal_kegiatan', 'desc');

        // Filter tanggal untuk publik
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_kegiatan', $request->tanggal);
        }

        // Paginasi 6 data dengan mempertahankan query string filter
        $kegiatan = $query->paginate(6)->withQueryString();
        
        return view('publik.kegiatan', compact('kegiatan'));
    }

    /**
     * Detail kegiatan untuk publik
     */
    public function publikShow($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('publik.kegiatan_show', compact('kegiatan'));
    }

    /**
     * Daftar kegiatan untuk Admin (Dashboard dengan Filter & Paginasi)
     */
    public function index(Request $request)
    {
        $query = Kegiatan::latest();

        // Filter tanggal untuk admin
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_kegiatan', $request->tanggal);
        }

        // Paginasi 6 data untuk admin
        $kegiatan = $query->paginate(6)->withQueryString();

        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Form tambah kegiatan baru
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Simpan kegiatan ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'jam_pelaksanaan'  => 'required',
            'lokasi'           => 'required|string|max:255',
            'deskripsi'        => 'required',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update data kegiatan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan'    => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'jam_pelaksanaan'  => 'required',
            'lokasi'           => 'required|string|max:255',
            'deskripsi'        => 'required',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil dihapus!');
    }
}