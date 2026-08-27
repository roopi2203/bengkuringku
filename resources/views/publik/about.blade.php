@extends('layouts.app')

@section('title', '')

@section('content')
<div class="pb-20 bg-slate-50/40">
    
    {{-- 1. HERO HEADER: Sesuai Kode Awal (Tidak Diubah) --}}
    <div class="max-w-6xl mx-auto px-4 pt-8 mb-12">
        <div class="relative bg-[#0f172a] rounded-[2.5rem] overflow-hidden p-8 md:p-12 text-center shadow-2xl shadow-blue-900/20">
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-10">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full blur-[100px]"></div>
                <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500 rounded-full blur-[100px]"></div>
            </div>

            <div class="relative z-10">
                <span class="text-blue-400 font-black uppercase tracking-[0.3em] text-[9px] mb-3 block">Informasi Resmi</span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-0 tracking-tight uppercase">
                    BENGKURING<span class="text-blue-500">KU</span>
                </h1>
            </div>
        </div>
    </div>

    {{-- 2. TENTANG KAMI: Tampilan Diperbarui Lebih Premium --}}
    <div class="max-w-5xl mx-auto px-6 mb-20">
        <div class="flex items-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
            <h2 class="text-lg md:text-xl font-black text-gray-400 tracking-[0.2em] uppercase whitespace-nowrap">Tentang Kami</h2>
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
        </div>

        <div class="group bg-white p-10 md:p-14 rounded-[3rem] border border-gray-100/80 shadow-xl shadow-gray-200/20 hover:shadow-2xl relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1">
            {{-- Watermark dekoratif latar belakang --}}
            <div class="absolute -right-12 -bottom-12 opacity-[0.03] pointer-events-none text-blue-600 transition-opacity group-hover:opacity-[0.05]">
                <svg class="w-72 h-72" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>

            <div class="relative z-10 text-left flex flex-col lg:flex-row items-start gap-10">
                {{-- Box Icon yang Seimbang --}}
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-blue-600/20 group-hover:rotate-6 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <div class="space-y-6 text-gray-600 text-base md:text-lg leading-relaxed font-semibold">
                    <p class="transition-colors group-hover:text-gray-700">
                        <span class="text-blue-600 font-black">Bengkuringku</span> lahir dari sebuah keresahan terhadap sistem penyebaran informasi lama yang cenderung tidak rapi, terfragmentasi, dan kurang profesional. Selama ini, banyak informasi penting bagi warga yang hilang tertumpuk begitu saja, sulit untuk dilacak kembali, dan tidak terorganisir dengan baik secara struktural.
                    </p>
                    <p class="transition-colors group-hover:text-gray-700">
                        Kami hadir sebagai solusi digital yang modern untuk memperbaiki tata kelola informasi tersebut. Dengan sistem <span class="text-blue-600 font-black">pengarsipan yang rapi</span> dan <span class="text-blue-600 font-black">fitur pencarian yang cerdas</span>, platform ini memastikan bahwa setiap berita, agenda, maupun kebijakan publik terdokumentasi secara profesional dan dapat ditemukan kembali oleh warga kapan pun dibutuhkan tanpa ada batasan waktu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. HUBUNGI KAMI: Perbaikan Komponen Grid & Tombol Modern --}}
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
            <h2 class="text-lg md:text-xl font-black text-gray-400 tracking-[0.2em] uppercase whitespace-nowrap">Hubungi Kami</h2>
            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
        </div>

        <div class="group bg-white p-10 md:p-14 rounded-[3.5rem] border border-gray-100 shadow-xl shadow-gray-200/20 hover:shadow-2xl relative overflow-hidden transition-all duration-300 transform hover:-translate-y-1">
            {{-- Watermark latar belakang kanan --}}
            <div class="absolute -right-10 -bottom-10 opacity-[0.03] pointer-events-none text-blue-600 transition-opacity group-hover:opacity-[0.05]">
                <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-center md:items-start gap-10">
                {{-- Icon Badge Box Berwarna --}}
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-0 shadow-lg shadow-blue-200 group-hover:rotate-6 transition-transform duration-500 shrink-0">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                
                {{-- Konten Utama --}}
                <div class="flex-1 text-center md:text-left w-full">
                    <h3 class="text-3xl font-black text-gray-900 mb-3 uppercase tracking-tight">Mari Berdiskusi</h3>
                    <p class="text-gray-500 text-base md:text-lg font-medium leading-relaxed mb-10 max-w-2xl">Punya informasi menarik atau kendala teknis? Tim Bengkuringku siap membantu Anda kapan saja.</p>

                    {{-- Layout Tombol Responsif --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-xl mx-auto md:mx-0">
                        <a href="https://wa.me/your-number" target="_blank" class="bg-blue-600 text-white py-4.5 px-6 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-slate-950 transition-colors duration-300 active:scale-95 flex items-center justify-center gap-3 shadow-xl shadow-blue-600/15">
                            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.483 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.308 1.656zm6.222-3.645c1.547.917 3.097 1.373 4.618 1.374 5.303 0 9.615-4.312 9.617-9.617.001-2.571-1.002-4.987-2.825-6.81-1.822-1.821-4.239-2.822-6.81-2.822-5.305 0-9.617 4.312-9.619 9.618 0 1.748.473 3.391 1.37 4.814l-.997 3.637 3.746-.984z"/></svg>
                            <span>Hubungi Admin</span>
                        </a>

                        <a href="mailto:redaksi@bengkuringku.com" class="bg-white border-2 border-blue-100 text-blue-600 py-4.5 px-6 rounded-2xl font-black text-xs uppercase tracking-widest hover:border-blue-600 transition-colors duration-300 active:scale-95 flex items-center justify-center gap-3 shadow-lg shadow-gray-100/50">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Email Redaksi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection