@extends('layouts.app')

@section('title', '')

@section('content')
<div class="pb-16">
    {{-- HERO HEADER --}}
    <div class="max-w-6xl mx-auto px-4 pt-8 mb-12">
        <div class="relative bg-[#0f172a] rounded-[2.5rem] overflow-hidden p-8 md:p-12 text-center shadow-2xl shadow-blue-900/20">
            {{-- Elemen Dekoratif --}}
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-10">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full blur-[100px]"></div>
                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500 rounded-full blur-[100px]"></div>
            </div>

            {{-- Konten Header dengan Tinggi Terkunci --}}
            <div class="relative z-10 flex flex-col items-center justify-center min-h-[220px]">
                <span class="text-blue-400 font-black uppercase tracking-[0.3em] text-[9px] mb-3 block">Portal Artikel Resmi</span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-8 tracking-tight uppercase">BENGKURING<span class="text-blue-500">KU</span></h1>
                
                <div class="w-full flex justify-center">
                    <form action="/" method="GET" class="flex items-center bg-white/10 backdrop-blur-md p-2 rounded-[2rem] border border-white/10 w-full max-w-md shadow-inner h-[60px]">
                        <div class="flex-1 flex items-center pl-4">
                            <svg class="w-5 h-5 text-blue-400 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari berita..." 
                                class="w-full border-none focus:ring-0 text-sm text-white bg-transparent placeholder-gray-500 font-bold">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-8 h-full rounded-[1.2rem] font-black text-[11px] uppercase tracking-wider hover:bg-blue-500 transition-all active:scale-95 shadow-lg shadow-blue-600/20 shrink-0">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4">
        {{-- Bagian Judul "Kabar Terbaru" telah dihapus sesuai permintaan --}}
        <div class="flex items-center justify-end mb-8 px-1">
            @if($search)
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] bg-gray-50 px-3 py-1 rounded-full border border-gray-100">Hasil: {{ $search }}</span>
            @endif
        </div>

        {{-- GRID BERITA (DIPERBARUI PADA PEMISAH & TANGGAL) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita as $item)
                <div class="group bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">
                    {{-- Area Gambar Berita --}}
                    <div class="h-52 w-full overflow-hidden bg-gray-50 relative shrink-0">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="flex flex-col items-center justify-center h-full text-gray-300 bg-gray-50/50">
                                <svg class="w-12 h-12 mb-1 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>

                    {{-- Area Informasi Teks --}}
                    <div class="p-6 flex-grow flex flex-col">
                        {{-- Elemen Waktu Upload Berita Premium --}}
                        <div class="flex items-center gap-1.5 text-blue-600 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-[10px] font-black uppercase tracking-wider">
                                {{ $item->tanggal_publish->translatedFormat('d M Y') }}
                            </span>
                        </div>

                        <h3 class="text-lg font-black text-gray-900 mb-2 leading-snug line-clamp-2 group-hover:text-blue-600 transition-colors">
                            {{ $item->judul }}
                        </h3>
                        
                        <p class="text-gray-500 text-xs leading-relaxed line-clamp-3 mb-5 font-medium">
                            {{ Str::limit(strip_tags($item->konten), 100) }}
                        </p>
                        
                        {{-- Garis Pemisah Desain Tipis & Estetik Sebelum Tombol Aksi --}}
                        <div class="w-full border-t border-dashed border-gray-100 mt-auto pt-4 flex items-center justify-between">
                            {{-- Link Aksi Baca --}}
                            <a href="{{ route('berita.show', $item->id) }}" class="inline-flex items-center gap-2 text-blue-600 font-black text-[10px] uppercase tracking-widest group-hover:text-slate-900 transition-all">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200">
                    <p class="text-gray-400 font-bold text-sm uppercase tracking-widest">Tidak ada berita ditemukan</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-16">
            @if (method_exists($berita, 'hasPages') && $berita->hasPages())
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white px-6 py-4 rounded-[2rem] shadow-lg shadow-gray-100/70 border border-gray-50">
                    {{-- Info Teks Halaman --}}
                    <div class="text-[10px] font-black text-gray-400 uppercase tracking-wider">
                        Menampilkan <span class="text-gray-900 font-black">{{ $berita->firstItem() }}</span> 
                        sampai <span class="text-gray-900 font-black">{{ $berita->lastItem() }}</span> 
                        dari <span class="text-blue-600 font-black">{{ $berita->total() }}</span> berita
                    </div>

                    {{-- Kontrol Navigasi Angka --}}
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1.5">
                        {{-- Tombol Previous --}}
                        @if ($berita->onFirstPage())
                            <span class="p-2.5 text-gray-300 cursor-not-allowed bg-gray-50 rounded-full border border-gray-100">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                            </span>
                        @else
                            <a href="{{ $berita->appends(['search' => $search])->previousPageUrl() }}" class="p-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 bg-white rounded-full border border-gray-200 transition-all active:scale-90 shadow-sm" rel="prev">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                            </a>
                        @endif

                        {{-- Loop Angka Halaman Menggunakan Standar For --}}
                        @for ($i = 1; $i <= $berita->lastPage(); $i++)
                            @if ($i == $berita->currentPage())
                                <span aria-current="page" class="px-4 py-2 text-xs font-black bg-blue-600 text-white rounded-full shadow-md shadow-blue-600/20 border border-blue-600 cursor-default">
                                    {{ $i }}
                                </span>
                            @else
                                <a href="{{ $berita->appends(['search' => $search])->url($i) }}" class="px-4 py-2 text-xs font-bold text-gray-500 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 bg-white rounded-full border border-gray-200 transition-all active:scale-95">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor

                        {{-- Tombol Next --}}
                        @if ($berita->hasMorePages())
                            <a href="{{ $berita->appends(['search' => $search])->nextPageUrl() }}" class="p-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 hover:border-blue-200 bg-white rounded-full border border-gray-200 transition-all active:scale-90 shadow-sm" rel="next">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        @else
                            <span class="p-2.5 text-gray-300 cursor-not-allowed bg-gray-50 rounded-full border border-gray-100">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection