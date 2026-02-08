@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="max-w-4xl mx-auto pt-4 pb-12">
    <div class="mb-8 px-4 md:px-0">
        <a href="{{ route('kegiatan.index') }}" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-emerald-600 transition-colors">
            <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-100 mr-3 group-hover:bg-emerald-50 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>
            Batal & Kembali
        </a>
        <h1 class="text-4xl font-black text-gray-900 mt-6 tracking-tight">Edit Kegiatan</h1>
        <p class="text-gray-500 mt-2 font-medium">Perbarui detail agenda agar informasi tetap akurat bagi warga desa.</p>
    </div>

    <div class="bg-white rounded-[3rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" class="p-8 md:p-14">
            @csrf
            @method('PUT')
            
            <div class="space-y-10">
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required
                        class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all text-lg font-bold placeholder:text-gray-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan->format('Y-m-d')) }}" required
                            class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all font-bold text-gray-700">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Jam Pelaksanaan</label>
                        <input type="time" name="jam_pelaksanaan" value="{{ old('jam_pelaksanaan', \Carbon\Carbon::parse($kegiatan->jam_pelaksanaan)->format('H:i')) }}" required
                            class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all font-bold text-gray-700">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Lokasi Pelaksanaan</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required
                        class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all font-bold text-gray-700 placeholder:text-gray-300">
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-1">Deskripsi / Detail Kegiatan</label>
                    <textarea name="deskripsi" rows="6" required
                        class="w-full px-8 py-6 rounded-[2rem] border-2 border-gray-50 bg-gray-50/30 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/5 outline-none transition-all text-gray-700 leading-relaxed placeholder:text-gray-300">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-50">
                    <a href="{{ route('kegiatan.index') }}" class="text-sm font-bold text-gray-400 hover:text-red-500 transition-colors order-2 md:order-1">
                        Batalkan Perubahan
                    </a>
                    <button type="submit" class="w-full md:w-auto bg-emerald-600 text-white font-black px-12 py-5 rounded-[1.5rem] hover:bg-gray-900 shadow-lg active:scale-95 transition-all flex items-center justify-center gap-3 order-1 md:order-2">
                        <span>Simpan Perubahan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection