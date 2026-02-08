<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // Halaman Depan Publik (/)
    public function indexPublic(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('judul', 'like', "%$s%")
                  ->orWhereDate('tanggal_publish', $s)
                  ->orWhereYear('tanggal_publish', $s);
        }

        $berita = $query->latest()->paginate(6); 
    
        // Pastikan variabel 'search' dikirim ke view agar input di search bar tidak hilang
        $search = $request->search; 

        return view('publik.landing', compact('berita', 'search'));
    }

    // Dashboard Admin Statistik
    public function adminDashboard()
    {
        $totalBerita = Berita::count();
        $totalKegiatan = Kegiatan::count();
        return view('admin.dashboard', compact('totalBerita', 'totalKegiatan'));
    }

    // List Berita untuk Admin (CRUD)
    public function index(Request $request)
    {
        $search = $request->search;
        $berita = Berita::when($search, function($query) use ($search) {
            return $query->where('judul', 'like', "%$search%");
        })->latest()->paginate(6); // Gunakan paginate

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'tanggal_publish' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $namaFile);
            $data['gambar'] = $namaFile; 
        }

        Berita::create($data);

        // PERBAIKAN: Menggunakan admin.berita.index
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambah!');
    }

    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', compact('beritum'));
    }

    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'tanggal_publish' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($beritum->gambar) {
                $pathLama = public_path('uploads/berita/' . $beritum->gambar);
                if (File::exists($pathLama)) {
                    File::delete($pathLama);
                }
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $beritum->update($data);

        // PERBAIKAN: Menggunakan admin.berita.index
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $beritum)
    {
        if ($beritum->gambar) {
            $path = public_path('uploads/berita/' . $beritum->gambar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $beritum->delete();

        // PERBAIKAN: Menggunakan admin.berita.index
        return redirect()->route('admin.berita.index')->with('success', 'Berita dan gambar berhasil dihapus!');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        
        $beritaLainnya = Berita::where('id', '!=', $id)
                                ->latest()
                                ->take(3)
                                ->get();
        
        return view('publik.show_berita', compact('berita', 'beritaLainnya'));
    }
}