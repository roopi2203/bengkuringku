@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-black text-gray-900 tracking-tight">Kelola Kegiatan</h1>
    <p class="text-gray-500 text-sm font-medium mt-1">Atur jadwal dan agenda kegiatan desa Anda.</p>
</div>

<div class="mb-6">
    <a href="{{ route('kegiatan.create') }}" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-6 py-2.5 rounded-2xl hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 font-bold text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Kegiatan
    </a>
</div>

<div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-gray-100/50 border border-gray-100 mb-8">
    <form action="{{ route('kegiatan.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[240px]">
            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1">Filter Tanggal</label>
            <div class="relative">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}" 
                       class="w-full bg-gray-50 border-gray-100 rounded-xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 text-sm transition-all py-2.5">
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-gray-900 text-white px-6 py-2.5 rounded-xl hover:bg-emerald-600 transition-all text-sm font-bold shadow-md shadow-gray-200">
                Terapkan Filter
            </button>
            @if(request('tanggal'))
                <a href="{{ route('kegiatan.index') }}" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 transition-all text-sm font-bold">
                    Reset
                </a>
            @endif
        </div>
    </form>
</div>

<div class="bg-white rounded-[2rem] shadow-xl shadow-gray-100/50 border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50/50 border-b border-gray-100">
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em]">Nama Kegiatan</th>
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em]">Waktu Pelaksanaan</th>
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em] text-center w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50 text-gray-700">
            @forelse($kegiatan as $k)
            <tr class="hover:bg-emerald-50/30 transition-colors group">
                <td class="p-5">
                    <span class="font-bold text-gray-900 text-base leading-snug group-hover:text-emerald-700 transition-colors">
                        {{ $k->nama_kegiatan }}
                    </span>
                </td>
                <td class="p-5">
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-gray-700">{{ \Carbon\Carbon::parse($k->tanggal_kegiatan)->translatedFormat('d M Y') }}</span>
                        <span class="text-[11px] text-gray-400 font-medium flex items-center gap-1 mt-1 uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $k->jam_pelaksanaan ?? 'Waktu menyesuaikan' }}
                        </span>
                    </div>
                </td>
                <td class="p-5 text-center">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('kegiatan.edit', $k->id) }}" 
                           class="p-2.5 bg-yellow-50 text-yellow-600 rounded-xl hover:bg-yellow-500 hover:text-white transition-all shadow-sm shadow-yellow-100/50"
                           title="Ubah Kegiatan">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                           </svg>
                        </a>
                        <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm shadow-red-100/50" 
                                    onclick="return confirm('Hapus Kegiatan ini?')"
                                    title="Hapus Kegiatan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-20 text-center text-gray-400">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="font-bold italic tracking-tight text-lg">Tidak ada jadwal kegiatan.</p>
                        <p class="text-xs">Coba ubah filter tanggal atau tambahkan kegiatan baru.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-8 flex justify-center">
    {{ $kegiatan->links() }}
</div>

@endsection