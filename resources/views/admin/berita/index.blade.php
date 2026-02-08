@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-black text-gray-900 tracking-tight">Kelola Berita</h1>
    <p class="text-gray-500 text-sm font-medium mt-1">Total terdapat {{ $berita->total() }} artikel berita.</p>
</div>

<div class="mb-8">
    <a href="{{ route('berita.create') }}" class="inline-flex items-center gap-2 bg-gray-900 text-white px-6 py-2.5 rounded-2xl hover:bg-blue-600 transition-all shadow-lg shadow-gray-200 font-bold text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Berita
    </a>
</div>

<div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-gray-100/50 border border-gray-100 mb-8">
    <form action="{{ route('berita.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[240px]">
            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 ml-1">Cari Artikel</label>
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik judul berita..." 
                       class="w-full bg-gray-50 border-gray-100 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 text-sm transition-all py-2.5 pl-11">
                <div class="absolute left-4 top-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-gray-900 text-white px-6 py-2.5 rounded-xl hover:bg-blue-600 transition-all text-sm font-bold shadow-md shadow-gray-200">
                Terapkan Pencarian
            </button>
            @if(request('search'))
                <a href="{{ route('berita.index') }}" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 transition-all text-sm font-bold">
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
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em] w-24">Gambar</th>
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em]">Info Berita</th>
                <th class="p-5 font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em] text-center w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50 text-gray-700">
            @forelse($berita as $item)
            <tr class="hover:bg-blue-50/30 transition-colors group">
                <td class="p-5">
                    <div class="w-20 h-14 rounded-2xl bg-gray-100 overflow-hidden border-2 border-white shadow-sm group-hover:shadow-md transition-all">
                        @if($item->gambar)
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400 font-black bg-gray-50 uppercase tracking-tighter">No Img</div>
                        @endif
                    </div>
                </td>
                <td class="p-5">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-900 leading-snug group-hover:text-blue-600 transition-colors text-base">{{ Str::limit($item->judul, 65) }}</span>
                        <span class="text-[11px] text-gray-400 font-medium mt-1.5 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{-- MODIFIKASI DISINI: Format d M Y untuk menyingkat bulan --}}
                            {{ $item->tanggal_publish->translatedFormat('d M Y') }}
                        </span>
                    </div>
                </td>
                <td class="p-5 text-center">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('berita.edit', $item->id) }}" 
                           class="p-2.5 bg-yellow-50 text-yellow-600 rounded-xl hover:bg-yellow-500 hover:text-white transition-all shadow-sm shadow-yellow-100/50"
                           title="Ubah Berita">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                           </svg>
                        </a>
                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm shadow-red-100/50" 
                                    onclick="return confirm('Hapus Artikel ini?')"
                                    title="Hapus Berita">
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
                <td colspan="3" class="p-20 text-center">
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-50 p-5 rounded-full mb-4">
                            <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        </div>
                        <p class="text-gray-400 font-bold italic tracking-tight">Belum ada berita ditemukan.</p>
                        <a href="{{ route('berita.index') }}" class="text-blue-600 text-sm font-bold mt-2 hover:underline">Reset Pencarian</a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-8 flex justify-center">
    {{ $berita->appends(['search' => request('search')])->links() }}
</div>
@endsection