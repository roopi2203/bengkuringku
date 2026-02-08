@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="pb-16">
    {{-- 1. HERO HEADER: Konsisten dengan About --}}
    <div class="max-w-6xl mx-auto px-4 pt-8 mb-12">
        <div class="relative bg-[#0f172a] rounded-[2.5rem] overflow-hidden p-8 md:p-12 text-center shadow-2xl shadow-blue-900/20">
            {{-- Elemen Dekoratif --}}
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-10">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full blur-[100px]"></div>
                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500 rounded-full blur-[100px]"></div>
            </div>

            <div class="relative z-10">
                <span class="text-blue-400 font-black uppercase tracking-[0.3em] text-[9px] mb-3 block">Frequently Asked Questions</span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-0 tracking-tight uppercase">
                    BENGKURING<span class="text-blue-500">KU</span>
                </h1>
            </div>
        </div>
    </div>

    {{-- 2. KONTEN FAQ --}}
    <div class="max-w-4xl mx-auto px-4"> 
        <div class="space-y-4" x-data="{ active: null }"> 
            {{-- Item 1 --}}
            <div class="group border border-gray-100 rounded-[1.8rem] bg-white overflow-hidden shadow-lg shadow-gray-200/20" :class="active === 1 ? 'ring-2 ring-blue-500/10' : ''">
                <button @click="active !== 1 ? active = 1 : active = null" 
                    class="w-full flex justify-between items-center p-6 md:p-8 text-left transition-colors">
                    <span class="font-bold text-gray-800 text-lg md:text-xl pr-6 group-hover:text-blue-600 transition-colors">Bagaimana cara mendapatkan informasi kegiatan terbaru?</span>
                    <div class="bg-gray-50 p-2 rounded-lg group-hover:bg-blue-50 transition-colors shrink-0">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div x-show="active === 1" x-collapse x-cloak class="px-8 pb-8 text-gray-500 leading-relaxed text-base md:text-lg font-medium">
                    Anda dapat memantau menu <strong class="text-blue-600 font-bold">Kegiatan</strong> pada navigasi atas atau melihat daftar berita terbaru di halaman utama untuk agenda mendatang.
                </div>
            </div>

            {{-- Item 2 --}}
            <div class="group border border-gray-100 rounded-[1.8rem] bg-white overflow-hidden shadow-lg shadow-gray-200/20" :class="active === 2 ? 'ring-2 ring-blue-500/10' : ''">
                <button @click="active !== 2 ? active = 2 : active = null" 
                    class="w-full flex justify-between items-center p-6 md:p-8 text-left transition-colors">
                    <span class="font-bold text-gray-800 text-lg md:text-xl pr-6 group-hover:text-blue-600 transition-colors">Apakah informasi di portal ini resmi?</span>
                    <div class="bg-gray-50 p-2 rounded-lg group-hover:bg-blue-50 transition-colors shrink-0">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div x-show="active === 2" x-collapse x-cloak class="px-8 pb-8 text-gray-500 leading-relaxed text-base md:text-lg font-medium">
                    Ya, seluruh konten yang dipublikasikan telah melalui verifikasi admin desa dan merupakan informasi resmi dari pemerintah desa.
                </div>
            </div>

            {{-- Item 3 --}}
            <div class="group border border-gray-100 rounded-[1.8rem] bg-white overflow-hidden shadow-lg shadow-gray-200/20" :class="active === 3 ? 'ring-2 ring-blue-500/10' : ''">
                <button @click="active !== 3 ? active = 3 : active = null" 
                    class="w-full flex justify-between items-center p-6 md:p-8 text-left transition-colors">
                    <span class="font-bold text-gray-800 text-lg md:text-xl pr-6 group-hover:text-blue-600 transition-colors">Bagaimana jika saya ingin berkontribusi berita?</span>
                    <div class="bg-gray-50 p-2 rounded-lg group-hover:bg-blue-50 transition-colors shrink-0">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-300" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div x-show="active === 3" x-collapse x-cloak class="px-8 pb-8 text-gray-500 leading-relaxed text-base md:text-lg font-medium">
                    Silakan hubungi kami melalui halaman <strong class="text-blue-600">Tentang Kami</strong> untuk menyerahkan informasi atau prestasi warga yang ingin dimuat.
                </div>
            </div>

            {{-- Item 4 --}}
            <div class="group border border-gray-100 rounded-[1.8rem] bg-white overflow-hidden shadow-lg shadow-gray-200/20" :class="active === 4 ? 'ring-2 ring-blue-500/10' : ''">
                <button @click="active !== 4 ? active = 4 : active = null" 
                    class="w-full flex justify-between items-center p-6 md:p-8 text-left transition-colors">
                    <span class="font-bold text-gray-800 text-lg md:text-xl pr-6 group-hover:text-blue-600 transition-colors">Apakah ada notifikasi untuk pengumuman darurat?</span>
                    <div class="bg-gray-50 p-2 rounded-lg group-hover:bg-blue-50 transition-colors shrink-0">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-300" :class="active === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div x-show="active === 4" x-collapse x-cloak class="px-8 pb-8 text-gray-500 leading-relaxed text-base md:text-lg font-medium">
                    Pengumuman darurat akan ditampilkan dengan banner khusus di bagian paling atas halaman utama agar segera terbaca.
                </div>
            </div>

            {{-- Item 5 --}}
            <div class="group border border-gray-100 rounded-[1.8rem] bg-white overflow-hidden shadow-lg shadow-gray-200/20" :class="active === 5 ? 'ring-2 ring-blue-500/10' : ''">
                <button @click="active !== 5 ? active = 5 : active = null" 
                    class="w-full flex justify-between items-center p-6 md:p-8 text-left transition-colors">
                    <span class="font-bold text-gray-800 text-lg md:text-xl pr-6 group-hover:text-blue-600 transition-colors">Bagaimana cara melaporkan kendala di desa?</span>
                    <div class="bg-gray-50 p-2 rounded-lg group-hover:bg-blue-50 transition-colors shrink-0">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-300" :class="active === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div x-show="active === 5" x-collapse x-cloak class="px-8 pb-8 text-gray-500 leading-relaxed text-base md:text-lg font-medium">
                    Untuk saat ini, laporan kendala dapat dikirimkan melalui WhatsApp resmi pengaduan yang tertera di bagian bawah website.
                </div>
            </div>
        </div>

        {{-- 3. CARD BUTUH BANTUAN LAIN --}}
        <div class="group mt-16 bg-white p-10 md:p-14 rounded-[3rem] border border-gray-100 shadow-xl shadow-gray-200/30 relative overflow-hidden text-center">
            {{-- Watermark dekoratif --}}
            <div class="absolute -right-8 -bottom-8 opacity-[0.03] pointer-events-none">
                <svg class="w-48 h-48 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/></svg>
            </div>

            <div class="relative z-10 flex flex-col items-center">
                {{-- Logo "?" dengan gaya Visi Misi --}}
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-200 group-hover:rotate-6 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <h3 class="font-black text-gray-900 mb-3 text-2xl md:text-3xl uppercase tracking-tight">Butuh bantuan lain?</h3>
                <p class="text-gray-500 mb-10 text-lg font-medium leading-relaxed max-w-xl">Kami siap menjawab pertanyaan Anda secara langsung. Jangan ragu untuk menghubungi tim admin kami.</p>
                
                <a href="/about" class="bg-blue-600 text-white px-12 py-5 rounded-[1.8rem] font-black text-lg hover:bg-gray-900 transition-colors shadow-xl shadow-blue-100 active:scale-95 flex items-center gap-3">
                    <span>Hubungi Kami Sekarang</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection