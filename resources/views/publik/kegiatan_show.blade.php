@extends('layouts.app')

@section('title', $berita->judul ?? '')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Tombol Kembali --}}
    <div class="mb-6">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center text-blue-600 font-bold text-xs uppercase tracking-wider group">
            <div class="bg-blue-50 p-2 rounded-full mr-2 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>
            Kembali ke Beranda
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Utama Berita --}}
        <div class="lg:col-span-2 bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
            
            {{-- Badge Kategori & Tanggal --}}
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-blue-600 text-white font-bold text-[10px] uppercase tracking-wider px-3 py-1 rounded-md">
                    {{ $berita->kategori ?? 'Informasi Desa' }}
                </span>
                <span class="text-xs font-semibold text-gray-400 uppercase">
                    {{ $berita->created_at ? $berita->created_at->format('d F Y') : '' }}
                </span>
            </div>

            {{-- Judul Berita --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-6">
                {{ $berita->judul }}
            </h1>

            {{-- Gambar Berita --}}
            @if(isset($berita->gambar))
            <div class="mb-8 rounded-2xl overflow-hidden shadow-sm">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto object-cover max-h-[450px]">
            </div>
            @endif

            {{-- Isi Berita --}}
            <div class="prose max-w-none text-gray-700 leading-relaxed font-normal">
                {!! $berita->isi !!}
            </div>
        </div>

        {{-- Sidebar Kanan --}}
        <div class="space-y-6">
            {{-- Widget Berita Lainnya --}}
            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-1.5 h-5 bg-blue-600 rounded-full"></div>
                    <h3 class="font-bold text-gray-900 uppercase tracking-wider text-sm">Berita Lainnya</h3>
                </div>

                <div class="space-y-4">
                    @foreach($beritaLainnya ?? [] as $item)
                    <a href="{{ route('berita.show', $item->id) }}" class="block p-4 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all">
                        <span class="text-[10px] font-bold text-blue-600 uppercase mb-1 block">
                            {{ $item->created_at ? $item->created_at->format('d M Y') : '' }}
                        </span>
                        <h4 class="font-bold text-gray-800 text-sm line-clamp-2 leading-snug">
                            {{ $item->judul }}
                        </h4>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Widget Bagikan Berita --}}
            <div class="bg-gradient-to-br from-blue-50/50 to-white rounded-3xl p-6 border border-blue-50">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1.5 h-5 bg-blue-600 rounded-full"></div>
                    <h3 class="font-bold text-gray-900 uppercase tracking-wider text-sm">Bagikan Berita</h3>
                </div>

                <div class="flex gap-3">
                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" class="flex-1 bg-emerald-100 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-colors duration-300 py-3 rounded-2xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.483 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.308 1.656zm6.222-3.645c1.547.917 3.097 1.373 4.618 1.374 5.303 0 9.615-4.312 9.617-9.617.001-2.571-1.002-4.987-2.825-6.81-1.822-1.821-4.239-2.822-6.81-2.822-5.305 0-9.617 4.312-9.619 9.618 0 1.748.473 3.391 1.37 4.814l-.997 3.637 3.746-.984z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="flex-1 bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors duration-300 py-3 rounded-2xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection