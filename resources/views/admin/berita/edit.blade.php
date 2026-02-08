@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <div class="mb-10">
        <a href="{{ route('berita.index') }}" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-blue-600 transition-colors">
            <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-100 mr-3 group-hover:bg-blue-50 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>
            Batal & Kembali
        </a>
        <h1 class="text-4xl font-black text-gray-900 mt-6 tracking-tight">Edit Berita</h1>
        <p class="text-gray-500 mt-2 font-medium">Perbarui informasi artikel agar tetap akurat dan relevan.</p>
    </div>

    <div class="bg-white rounded-[3rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
        <form action="{{ route('berita.update', $beritum->id) }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-14">
            @csrf
            @method('PUT')

            <div class="mb-8">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Judul Berita</label>
                <input type="text" name="judul" value="{{ $beritum->judul }}" 
                    class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-lg font-bold placeholder:text-gray-300" 
                    required placeholder="Ketik judul berita...">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-8">
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Tanggal Publish</label>
                    <input type="date" name="tanggal_publish" value="{{ $beritum->tanggal_publish->format('Y-m-d') }}" 
                        class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all font-bold text-gray-700" 
                        required>
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*"
                        class="w-full px-5 py-4 rounded-[1.5rem] border-2 border-dashed border-gray-200 bg-gray-50/30 hover:border-blue-400 transition-all outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                </div>
            </div>

            @if($beritum->gambar)
            <div class="mb-10 p-6 bg-blue-50/50 rounded-[2rem] border border-blue-100/50 inline-flex flex-col">
                <p class="text-[10px] font-black text-blue-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Gambar Saat Ini
                </p>
                <div class="relative group">
                    <img src="{{ asset('uploads/berita/' . $beritum->gambar) }}" class="h-44 rounded-2xl border-4 border-white shadow-lg shadow-blue-200/50 transition-transform group-hover:scale-[1.02] duration-300">
                </div>
            </div>
            @endif

            <div class="mb-12">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Isi Konten Berita</label>
                <textarea name="konten" rows="12" 
                    class="w-full px-8 py-6 rounded-[2rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-gray-700 leading-relaxed placeholder:text-gray-300" 
                    required placeholder="Tuliskan isi berita di sini...">{{ $beritum->konten }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-8 border-t border-gray-50">
                <a href="{{ route('berita.index') }}" class="text-sm font-bold text-gray-400 hover:text-red-500 transition-colors">
                    Batalkan Perubahan
                </a>
                <button type="submit" class="w-full md:w-auto bg-blue-600 text-white font-black px-12 py-5 rounded-[1.5rem] hover:bg-gray-900 shadow-2xl shadow-blue-200 hover:shadow-gray-200 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <span>Simpan Perubahan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l6-6a1 1 0 00-1.414-1.414L11 12.586l-3.293-3.293z" />
                        <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V5z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection