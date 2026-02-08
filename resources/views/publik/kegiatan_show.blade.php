@extends('layouts.app')

@section('title', $kegiatan->nama_kegiatan)

@section('content')

<div class="max-w-4xl mx-auto pt-6 pb-16 px-4">
    
    <a href="{{ route('publik.kegiatan.index') }}" class="inline-flex items-center text-blue-600 font-black text-[10px] uppercase tracking-widest mb-8 group">
        <div class="bg-blue-50 p-2.5 rounded-xl mr-3 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </div>
        Kembali ke Agenda
    </a>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/40 border border-gray-100 overflow-hidden relative">
        {{-- Elemen Dekoratif --}}
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-blue-50/50 rounded-full blur-3xl"></div>

        <div class="p-8 md:p-12 relative bg-white">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg font-black text-[9px] uppercase tracking-widest border border-blue-100">
                    Agenda Kegiatan
                </span>
                
                {{-- Status Badge menggantikan posisi tanggal --}}
                @php
                    $waktuKegiatan = \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan->format('Y-m-d') . ' ' . $kegiatan->jam_pelaksanaan);
                @endphp

                @if($waktuKegiatan->isFuture())
                    <span class="text-emerald-500 font-black text-[9px] uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100">Akan Datang</span>
                @else
                    <span class="text-gray-400 font-black text-[9px] uppercase tracking-widest bg-gray-50 px-3 py-1 rounded-lg border border-gray-100">Selesai</span>
                @endif
            </div>

            <h1 class="text-3xl md:text-5xl font-black text-gray-900 mb-10 leading-[1.15] tracking-tight">
                {{ $kegiatan->nama_kegiatan }}
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12">
                <div class="bg-gray-50/50 p-6 rounded-[2rem] flex items-center gap-5 border border-gray-100/50 hover:bg-white hover:shadow-xl hover:shadow-gray-100 transition-all duration-300">
                    <div class="bg-blue-600 p-4 rounded-2xl shadow-lg shadow-blue-100 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[9px] text-gray-400 font-black uppercase tracking-[0.15em] mb-1">Waktu Pelaksanaan</p>
                        {{-- Tanggal nimbrung di sini --}}
                        <p class="text-base font-black text-gray-800 leading-tight">
                            {{ $kegiatan->tanggal_kegiatan->translatedFormat('d F Y') }} <br>
                            <span class="text-blue-600 text-sm italic opacity-80">{{ \Carbon\Carbon::parse($kegiatan->jam_pelaksanaan)->format('H:i') }} WITA</span>
                        </p>
                    </div>
                </div>

                <div class="bg-gray-50/50 p-6 rounded-[2rem] flex items-center gap-5 border border-gray-100/50 hover:bg-white hover:shadow-xl hover:shadow-gray-100 transition-all duration-300">
                    <div class="bg-emerald-500 p-4 rounded-2xl shadow-lg shadow-emerald-100 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div class="flex-1"> 
                        <p class="text-[9px] text-gray-400 font-black uppercase tracking-[0.15em] mb-1">Lokasi Kegiatan</p>
                        <p class="text-base font-black text-gray-800 leading-tight">
                            {{ $kegiatan->lokability ?? $kegiatan->lokasi }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="px-1">
                <div class="flex items-center gap-3 mb-4">
                    <h3 class="text-[10px] font-black text-blue-600 uppercase tracking-[0.3em]">Deskripsi Kegiatan</h3>
                    <div class="h-[1px] flex-1 bg-gradient-to-r from-gray-100 to-transparent"></div>
                </div>
                
                <div class="text-gray-600 leading-[1.8] text-base md:text-lg font-medium whitespace-pre-line bg-blue-50/30 p-6 md:p-8 rounded-[2rem] border border-blue-50">
                    {{ $kegiatan->deskripsi }}
                </div>
            </div>

            {{-- Widget Bagikan --}}
            <div class="mt-12 pt-10 border-t border-gray-50 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="text-center md:text-left">
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Informasi ini bermanfaat?</h4>
                    <p class="text-sm font-black text-gray-900">Bagikan ke warga lainnya</p>
                </div>
                <div class="flex gap-3">
                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection