@extends('layouts.app')

@section('content')
{{-- Header --}}
<div class="mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
    <div class="text-center md:text-left">
        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Dashboard Admin</h1>
        <p class="text-gray-500 text-sm font-medium">Pantau dan kelola portal berita desa dalam satu layar.</p>
    </div>
    <div class="hidden md:block">
        <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-200">Sesi Aktif</span>
    </div>
</div>

{{-- Greeting Card --}}
<div class="bg-white rounded-[1.5rem] shadow-xl shadow-gray-100/50 border border-gray-100 p-6 mb-8 overflow-hidden relative">
    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full blur-3xl opacity-50"></div>
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 relative z-10">
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight" id="greeting">Memuat Sapaan...</h2>
            <p class="text-blue-600 text-sm font-bold mt-0.5 flex items-center justify-center md:justify-start gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span id="full-date" class="text-xs uppercase tracking-wide">...</span>
            </p>
        </div>
        <div class="flex flex-col items-center">
            <div class="bg-gray-900 px-6 py-2.5 rounded-xl shadow-xl">
                <span class="block text-2xl font-black text-white tabular-nums tracking-widest" id="realtime-clock">00:00:00</span>
            </div>
            <span class="text-[9px] uppercase font-black text-gray-400 mt-2 tracking-[0.2em]">Waktu Indonesia Tengah (WITA)</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Kolom Statistik dan Aksi (2/3) --}}
    <div class="lg:col-span-2 space-y-6">
        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="group bg-white p-0.5 rounded-[1.8rem] bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg shadow-blue-100 transition-transform hover:scale-[1.01]">
                <div class="bg-white p-6 rounded-[1.7rem] flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Berita</p>
                            <h3 class="text-3xl font-black text-gray-900 mt-0.5">{{ $totalBerita }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group bg-white p-0.5 rounded-[1.8rem] bg-gradient-to-br from-green-500 to-green-600 shadow-lg shadow-green-100 transition-transform hover:scale-[1.01]">
                <div class="bg-white p-6 rounded-[1.7rem] flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-green-50 rounded-xl text-green-600">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Kegiatan</p>
                            <h3 class="text-3xl font-black text-gray-900 mt-0.5">{{ $totalKegiatan }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Widget Aksi Cepat --}}
        <div class="bg-white border border-gray-100 rounded-[1.5rem] p-6 shadow-sm">
            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4 text-center md:text-left">Aksi Cepat</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <a href="{{ route('berita.create') }}" class="flex flex-col items-center p-3 rounded-2xl bg-gray-50 hover:bg-blue-50 hover:text-blue-600 transition-all border border-transparent hover:border-blue-100">
                    <svg class="w-5 h-5 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">Tambah Berita</span>
                </a>
                <a href="{{ route('kegiatan.create') }}" class="flex flex-col items-center p-3 rounded-2xl bg-gray-50 hover:bg-green-50 hover:text-green-600 transition-all border border-transparent hover:border-green-100">
                    <svg class="w-5 h-5 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">Tambah Agenda</span>
                </a>
                <a href="/" target="_blank" class="flex flex-col items-center p-3 rounded-2xl bg-gray-50 hover:bg-purple-50 hover:text-purple-600 transition-all border border-transparent hover:border-purple-100">
                    <svg class="w-5 h-5 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">Lihat Web</span>
                </a>
                <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center p-3 rounded-2xl bg-gray-50 hover:bg-orange-50 hover:text-orange-600 transition-all border border-transparent hover:border-orange-100">
                    <svg class="w-5 h-5 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">Refresh Data</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Kolom Samping (1/3) --}}
    <div class="space-y-6">
        {{-- Widget Cuaca Desa --}}
        <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-[1.5rem] p-5 text-white shadow-lg shadow-blue-200 h-full flex flex-col justify-center">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-80">Cuaca Desa</p>
                    <h5 class="text-2xl font-black">Cerah Berawan</h5>
                    <p class="text-xs font-bold opacity-90">Samarinda, Kaltim</p>
                </div>
                <span class="text-4xl">🌤️</span>
            </div>
            <div class="mt-4 pt-4 border-t border-white/20 flex justify-between">
                <div class="text-center">
                    <p class="text-[9px] font-bold opacity-70 uppercase">Suhu</p>
                    <p class="text-xs font-black">31°C</p>
                </div>
                <div class="text-center">
                    <p class="text-[9px] font-bold opacity-70 uppercase">Lembap</p>
                    <p class="text-xs font-black">78%</p>
                </div>
                <div class="text-center">
                    <p class="text-[9px] font-bold opacity-70 uppercase">Angin</p>
                    <p class="text-xs font-black">12 km/h</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateDashboardTime() {
        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        const dayName = days[now.getDay()];
        const date = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();
        
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        let greeting = "";
        const hr = now.getHours();
        if (hr >= 5 && hr < 11) greeting = "Selamat Pagi! ☀️";
        else if (hr >= 11 && hr < 15) greeting = "Selamat Siang! 🌤️";
        else if (hr >= 15 && hr < 18) greeting = "Selamat Sore! 🌥️";
        else greeting = "Selamat Malam! 🌙";

        const greetingEl = document.getElementById('greeting');
        const dateEl = document.getElementById('full-date');
        const clockEl = document.getElementById('realtime-clock');

        if(greetingEl) greetingEl.innerText = `${greeting}`;
        if(dateEl) dateEl.innerText = `${dayName}, ${date} ${monthName} ${year}`;
        if(clockEl) clockEl.innerText = `${hours}:${minutes}:${seconds}`;
    }

    setInterval(updateDashboardTime, 1000);
    updateDashboardTime();
</script>
@endsection