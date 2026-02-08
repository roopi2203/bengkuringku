@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="fixed top-[80px] left-0 w-full h-1.5 z-50">
    <div id="scroll-progress" class="h-full bg-blue-600 w-0 transition-all duration-150 shadow-[0_0_10px_rgba(37,99,235,0.5)]"></div>
</div>

<div class="max-w-6xl mx-auto pt-6 pb-16 px-4"> 
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12"> 
        
        {{-- KOLOM UTAMA --}}
        <div class="lg:col-span-2">
            <a href="/" class="inline-flex items-center text-blue-600 font-black text-[11px] uppercase tracking-widest mb-8 group">
                <div class="bg-blue-50 p-2.5 rounded-xl mr-3 shadow-sm group-hover:bg-blue-600 group-hover:text-white group-hover:-translate-x-1 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </div>
                Kembali ke Beranda
            </a>

            {{-- Menambahkan ID 'article-content' untuk patokan scroll --}}
            <article id="article-content" class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/40 border border-gray-100 overflow-hidden transition-all">
                <div class="px-6 py-8 md:px-12 md:pt-10 md:pb-0">
                    {{-- Baris Informasi Desa & Tanggal --}}
                    <div class="flex flex-wrap items-center gap-4 text-[10px] font-black mb-4 uppercase tracking-[0.2em]">
                        <span class="bg-blue-600 text-white px-4 py-1.5 rounded-lg">Informasi Desa</span>
                        <span class="text-gray-400 whitespace-nowrap">{{ $berita->tanggal_publish->translatedFormat('d F Y') }}</span>
                    </div>
                    
                    <h1 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 leading-[1.2] tracking-tight">
                        {{ $berita->judul }}
                    </h1>

                    <div class="flex items-center gap-3 mb-2 pb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Diterbitkan Oleh</p>
                            <p class="text-sm font-black text-gray-900">Pemerintah Desa</p>
                        </div>
                    </div>
                </div>

                @if($berita->gambar)
                <div class="px-6 md:px-12 mt-2">
                    <div class="rounded-xl overflow-hidden shadow-xl shadow-gray-300/20 group bg-gray-100 max-w-2xl">
                        <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" 
                             class="w-full h-auto object-cover max-h-[400px] group-hover:scale-105 transition-transform duration-1000" 
                             alt="{{ $berita->judul }}">
                    </div>
                </div>
                @endif

                <div class="px-6 py-8 md:px-12 md:pb-16">
                    <div class="text-gray-600 leading-[2.2] text-lg md:text-xl font-medium whitespace-pre-line">
                        {{ $berita->konten }}
                    </div>
                </div>
            </article>
        </div>

        {{-- SIDEBAR --}}
        <div class="lg:col-span-1 lg:mt-28">
            <div class="sticky top-28 space-y-10">
                
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                        <h3 class="text-sm font-black text-gray-900 uppercase tracking-widest">Berita Lainnya</h3>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($beritaLainnya as $lain)
                            <a href="{{ route('berita.show', $lain->id) }}" class="block group">
                                <div class="bg-white p-5 rounded-[1.8rem] border border-gray-100 shadow-sm group-hover:shadow-xl group-hover:shadow-blue-200/20 group-hover:border-blue-100 transition-all duration-300 group-hover:-translate-y-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-[9px] text-blue-600 font-black uppercase tracking-widest">{{ $lain->tanggal_publish->translatedFormat('d M Y') }}</p>
                                    </div>
                                    <h4 class="text-gray-800 text-sm font-black leading-snug group-hover:text-blue-600 transition-colors line-clamp-2 tracking-tight">
                                        {{ $lain->judul }}
                                    </h4>
                                </div>
                            </a>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-xs font-bold text-gray-400 uppercase">Tidak ada berita lain</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Widget Bagikan --}}
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/20 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-full -mr-12 -mt-12 transition-transform group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <h3 class="text-xs font-black text-gray-900 uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="w-1 h-4 bg-blue-600 rounded-full"></span>
                            Bagikan Berita
                        </h3>
                        <div class="flex gap-3">
                            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" class="flex-1 bg-emerald-50 text-emerald-600 p-4 rounded-2xl flex justify-center hover:bg-emerald-600 hover:text-white transition-all duration-300 shadow-sm">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="flex-1 bg-blue-50 text-blue-600 p-4 rounded-2xl flex justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Banner Kontak --}}
                <div class="bg-gray-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-gray-200 relative overflow-hidden group">
                    <div class="relative z-10 text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-blue-500/40 group-hover:rotate-6 transition-transform">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.827-1.233L3 20l1.326-3.945A8.959 8.959 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h4 class="font-black text-xl mb-3 tracking-tight">Butuh Bantuan?</h4>
                        <p class="text-gray-400 text-xs mb-8 leading-relaxed font-medium px-4">Hubungi layanan administrasi desa untuk informasi lebih lanjut dan bantuan resmi.</p>
                        <a href="/about" class="block w-full text-center bg-blue-600 text-white font-black py-4 rounded-2xl text-[11px] tracking-[0.2em] hover:bg-white hover:text-blue-600 transition-all duration-300 active:scale-95 shadow-lg shadow-blue-500/20">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    window.onscroll = function() {
        // Targetkan elemen artikel secara spesifik
        const article = document.getElementById('article-content');
        const progressBar = document.getElementById("scroll-progress");
        
        if (article) {
            // Posisi artikel saat ini terhadap viewport
            const rect = article.getBoundingClientRect();
            // Tinggi total artikel
            const articleHeight = article.offsetHeight;
            // Jarak yang sudah discroll dari atas artikel (offset 80px untuk navbar)
            const scrolledFromTop = Math.abs(rect.top - 80);
            
            // Logika: Hanya hitung jika artikel sudah menyentuh navbar (80px)
            let scrolled = 0;
            if (rect.top <= 80) {
                // Menghitung persentase scroll di dalam area artikel saja
                // (articleHeight - window.innerHeight) memastikan bar penuh saat akhir artikel terlihat
                scrolled = (scrolledFromTop / (articleHeight - window.innerHeight + 80)) * 100;
            }

            // Batasi antara 0 dan 100
            progressBar.style.width = Math.min(Math.max(scrolled, 0), 100) + "%";
        }
    };
</script>
@endsection