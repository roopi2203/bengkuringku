@extends('layouts.app')

@section('title', 'HOME')

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita as $item)
                <div class="group bg-white rounded-[1.8rem] border border-gray-100 shadow-lg shadow-gray-200/30 hover:shadow-xl transition-all duration-500 overflow-hidden flex flex-col">
                    <div class="h-52 w-full overflow-hidden bg-gray-50 relative shrink-0">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="flex flex-col items-center justify-center h-full text-gray-200">
                                <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-lg text-[9px] font-black text-blue-600 shadow-sm uppercase tracking-wider">
                                {{ $item->tanggal_publish->translatedFormat('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-lg font-black text-gray-900 mb-3 leading-tight line-clamp-2 group-hover:text-blue-600 transition-colors">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-gray-500 text-[12px] leading-relaxed line-clamp-3 mb-6 font-medium">
                            {{ Str::limit(strip_tags($item->konten), 100) }}
                        </p>
                        
                        <div class="mt-auto">
                            <a href="{{ route('berita.show', $item->id) }}" class="inline-flex items-center gap-2 text-blue-600 font-black text-[10px] uppercase tracking-widest hover:text-gray-900 transition-all">
                                Baca Selengkapnya
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
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

        <div class="mt-16 flex justify-center">
            {{ $berita->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection