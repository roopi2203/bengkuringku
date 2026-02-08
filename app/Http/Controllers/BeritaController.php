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

    $data = $request->all(); // Mengambil semua input (judul, konten, dll)

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        
        // Simpan file ke folder public/uploads/berita
        $file->move(public_path('uploads/berita'), $namaFile);
        
        // MASUKKAN NAMA FILE KE ARRAY DATA UNTUK DISIMPAN KE DB
        $data['gambar'] = $namaFile; 
    }

    Berita::create($data); // Data yang sudah ada nama gambarnya disimpan di sini

    return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambah!');
}

    public function edit(Berita $beritum) // Nama parameter 'beritum' sesuai resource route
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
        // 1. Hapus gambar lama jika ada
        if ($beritum->gambar) {
            $pathLama = public_path('uploads/berita/' . $beritum->gambar);
            if (File::exists($pathLama)) {
                File::delete($pathLama);
            }
        }

        // 2. Upload gambar baru
        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/berita'), $namaFile);
        $data['gambar'] = $namaFile;
    }

    $beritum->update($data);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
}

public function destroy(Berita $beritum)
{
    // Hapus gambar dari server sebelum data di database dihapus
    if ($beritum->gambar) {
        $path = public_path('uploads/berita/' . $beritum->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    $beritum->delete();

    return redirect()->route('berita.index')->with('success', 'Berita dan gambar berhasil dihapus!');
}

    public function show($id)
{
    $berita = Berita::findOrFail($id);
    
    // Mengambil 3 berita terbaru selain berita yang sedang dibaca
    $beritaLainnya = Berita::where('id', '!=', $id)
                            ->latest()
                            ->take(3)
                            ->get();
    
    return view('publik.show_berita', compact('berita', 'beritaLainnya'));
}

}