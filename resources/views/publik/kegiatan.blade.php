@extends('layouts.app')

@section('title', 'EVENTS')

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
                <span class="text-blue-400 font-black uppercase tracking-[0.3em] text-[9px] mb-3 block">Portal Kegiatan Resmi</span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-8 tracking-tight uppercase">BENGKURING<span class="text-blue-500">KU</span></h1>

                <div class="w-full flex justify-center">
                    <form action="{{ url()->current() }}" method="GET" class="flex items-center bg-white/10 backdrop-blur-md p-2 rounded-[2rem] border border-white/10 w-full max-w-md shadow-inner h-[60px]">
                        <div class="flex-1 flex items-center pl-4">
                            <svg class="w-5 h-5 text-blue-400 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <input type="date" name="tanggal" value="{{ request('tanggal') }}" 
                                   class="w-full border-none focus:ring-0 text-sm text-white bg-transparent font-bold tracking-wider uppercase cursor-pointer appearance-none [color-scheme:dark]">
                        </div>
                        
                        <div class="flex items-center gap-2 h-full">
                            @if(request('tanggal'))
                                <a href="{{ url()->current() }}" class="p-2 text-gray-400 hover:text-red-400 transition-all" title="Reset">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            @endif
                            <button type="submit" class="bg-blue-600 text-white px-8 h-full rounded-[1.2rem] font-black text-[11px] uppercase tracking-wider hover:bg-blue-500 transition-all active:scale-95 shadow-lg shadow-blue-600/20 shrink-0">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- GRID KEGIATAN --}}
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
            @forelse($kegiatan as $k)
            <div class="group bg-white rounded-[2.2rem] p-2 border border-gray-50 shadow-lg shadow-gray-200/30 hover:shadow-xl hover:shadow-blue-200/20 transition-all duration-500 hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-center gap-5 mb-6">
                        <div class="bg-blue-600 text-white w-14 h-14 rounded-2xl flex flex-col items-center justify-center shadow-lg shadow-blue-200 shrink-0">
                            <span class="text-lg font-black leading-none">{{ \Carbon\Carbon::parse($k->tanggal_kegiatan)->translatedFormat('d') }}</span>
                            <span class="text-[9px] font-black uppercase tracking-tighter">{{ \Carbon\Carbon::parse($k->tanggal_kegiatan)->translatedFormat('M') }}</span>
                            <span class="text-[9px] font-bold opacity-80">{{ \Carbon\Carbon::parse($k->tanggal_kegiatan)->translatedFormat('Y') }}</span>
                        </div>
                        <h3 class="text-lg font-black text-gray-900 leading-tight group-hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $k->nama_kegiatan }}
                        </h3>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-gray-500 font-bold text-[11px] uppercase tracking-widest bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100/50">
                            <svg class="w-5 h-5 mr-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="truncate">{{ $k->lokasi }}</span>
                        </div>
                        <div class="flex items-center text-gray-500 font-bold text-[11px] uppercase tracking-widest bg-gray-50 px-4 py-2.5 rounded-xl border border-gray-100/50">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ \Carbon\Carbon::parse($k->jam_pelaksanaan)->format('H:i') }} WITA</span>
                        </div>
                    </div>

                    <a href="{{ route('publik.kegiatan.show', $k->id) }}" class="flex items-center justify-center gap-2 bg-gray-900 text-white font-black py-4 rounded-[1.2rem] hover:bg-blue-600 transition-all active:scale-95 group/btn">
                        <span class="text-sm">Lihat Detail</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                <h3 class="text-2xl font-black text-gray-900 mb-2">Tidak Ada Agenda</h3>
                <p class="text-gray-400 text-sm font-medium mb-8">Belum ada kegiatan untuk tanggal ini.</p>
                <a href="{{ url()->current() }}" class="bg-blue-600 text-white px-8 py-3.5 rounded-xl font-black text-xs hover:bg-gray-900 transition-all shadow-lg shadow-blue-100">
                    Tampilkan Semua
                </a>
            </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $kegiatan->links() }}
        </div>
    </div>
</div>
@endsection