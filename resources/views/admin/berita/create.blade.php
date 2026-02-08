@extends('layouts.app')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10">
        {{-- PERUBAHAN DISINI: berita.index menjadi admin.berita.index --}}
        <a href="{{ route('admin.berita.index') }}" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-blue-600 transition-colors">
            <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-100 mr-3 group-hover:bg-blue-50 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>
            Kembali ke Daftar Berita
        </a>
        <h1 class="text-4xl font-black text-gray-900 mt-6 tracking-tight">Tulis Berita Baru</h1>
        <p class="text-gray-500 mt-2 font-medium">Buat artikel berita yang informatif dan menarik untuk warga desa.</p>
    </div>

    <div class="bg-white rounded-[3rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
        {{-- PERUBAHAN DISINI: berita.store menjadi admin.berita.store --}}
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-14">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required
                        class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-lg font-bold placeholder:text-gray-300"
                        placeholder="Ketik judul berita yang menarik...">
                    @error('judul') <p class="text-red-500 text-xs mt-2 ml-2 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Tanggal Publish</label>
                    <div class="relative">
                        <input type="date" name="tanggal_publish" value="{{ old('tanggal_publish', date('Y-m-d')) }}" required
                            class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all font-bold text-gray-700">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Gambar Utama</label>
                    <div class="relative">
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full px-5 py-4 rounded-[1.5rem] border-2 border-dashed border-gray-200 bg-gray-50/30 hover:border-blue-400 transition-all outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-3 ml-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Format: JPG, PNG, JPEG. Maksimum ukuran file 2MB.
                    </p>
                </div>
            </div>

            <div class="mb-12">
                <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Isi Konten Berita</label>
                <textarea name="konten" rows="12" required
                    class="w-full px-8 py-6 rounded-[2rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-gray-700 leading-relaxed placeholder:text-gray-300"
                    placeholder="Ceritakan detail kejadian atau berita secara lengkap di sini...">{{ old('konten') }}</textarea>
                @error('konten') <p class="text-red-500 text-xs mt-2 ml-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-6 border-t border-gray-50">
                <p class="text-xs text-gray-400 font-medium italic">Pastikan data yang Anda masukkan sudah benar sebelum menerbitkan.</p>
                <button type="submit" class="w-full md:w-auto bg-blue-600 text-white font-black px-12 py-5 rounded-[1.5rem] hover:bg-gray-900 shadow-2xl shadow-blue-200 hover:shadow-gray-200 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <span>Terbitkan Berita</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection