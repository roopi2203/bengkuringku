@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center px-4 bg-gray-50/50">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-[3rem] shadow-2xl shadow-blue-200/40 border border-gray-100 overflow-hidden transform transition-all">
            <div class="p-10 md:p-14">
                <div class="relative w-20 h-20 bg-blue-600 rounded-[2rem] flex items-center justify-center mb-10 mx-auto shadow-2xl shadow-blue-200 rotate-3 hover:rotate-0 transition-transform duration-500">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-400 rounded-full border-4 border-white"></div>
                </div>

                <div class="text-center mb-10">
                    <h2 class="text-3xl font-black text-gray-900 tracking-tight">Selamat Datang</h2>
                    <p class="text-gray-400 mt-3 font-medium">Kelola informasi desa dengan mudah dalam satu pintu.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-7">
                    @csrf
                    
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-2 group-focus-within:text-blue-600 transition-colors">Email Address</label>
                        <div class="relative">
                            <input type="email" name="email" required 
                                class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all font-bold text-gray-700 placeholder:text-gray-300"
                                placeholder="admin@desa.com">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-3 ml-2 group-focus-within:text-blue-600 transition-colors">Password</label>
                        <div class="relative">
                            <input type="password" name="password" required 
                                class="w-full px-6 py-5 rounded-[1.5rem] border-2 border-gray-50 bg-gray-50/50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all font-bold text-gray-700 placeholder:text-gray-300"
                                placeholder="••••••••">
                        </div>
                    </div>

                    {{-- Bagian Remember Me dan Lupa Password telah dihapus --}}

                    <button type="submit" 
                        class="w-full bg-blue-600 text-white font-black py-5 rounded-[1.5rem] hover:bg-gray-900 shadow-2xl shadow-blue-200 hover:shadow-gray-200 active:scale-[0.97] transition-all duration-300 flex items-center justify-center gap-3 group">
                        <span>Masuk ke Dashboard</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="/" class="group inline-flex items-center text-sm font-bold text-gray-400 hover:text-blue-600 transition-all duration-300">
                <div class="bg-white p-2 rounded-lg shadow-sm border border-gray-100 mr-3 group-hover:bg-blue-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </div>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection