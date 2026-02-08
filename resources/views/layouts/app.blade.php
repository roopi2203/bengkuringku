<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | BENGKURINGKU</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .active-link { color: #2563eb; position: relative; }
        .active-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background-color: #2563eb;
            border-radius: 50%;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-[#FAFAFA] flex flex-col min-h-screen antialiased text-gray-900">

    <nav class="glass-nav sticky top-0 z-50 border-b border-gray-100/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-black text-blue-600 tracking-tighter uppercase">
                        <span class="text-gray-900">BENGKURINGKU</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('admin/dashboard') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Statistik</a>
                        
                        {{-- PERBAIKAN: Menggunakan admin.berita.index --}}
                        <a href="{{ route('admin.berita.index') }}" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('admin/berita*') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Berita</a>
                        
                        {{-- PERBAIKAN: Menggunakan admin.kegiatan.index --}}
                        <a href="{{ route('admin.kegiatan.index') }}" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('admin/kegiatan*') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Kegiatan</a>
                        
                        <div class="h-5 w-[1px] bg-gray-200 mx-2"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-900 text-white text-[11px] px-5 py-2.5 rounded-xl font-black uppercase tracking-widest hover:bg-red-600 transition-all active:scale-95">Logout</button>
                        </form>
                    @else
                        <a href="/" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('/') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Beranda</a>
                        <a href="/kegiatan-publik" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('kegiatan-publik') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Kegiatan</a>
                        <a href="/faq" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('faq') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">FAQ</a>
                        <a href="/about" class="text-[13px] font-bold uppercase tracking-widest transition {{ Request::is('about') ? 'active-link' : 'text-gray-500 hover:text-blue-600' }}">Tentang Kami</a>
                        <a href="/login" class="bg-blue-600 text-white text-[11px] px-6 py-3 rounded-xl font-black uppercase tracking-widest hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95">Login</a>
                    @endauth
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-btn" class="text-gray-900 p-2 rounded-xl hover:bg-gray-50 transition">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-gray-100">
            <div class="px-4 py-6 space-y-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('admin/dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Dashboard</a>
                    
                    {{-- PERBAIKAN: Menggunakan admin.berita.index --}}
                    <a href="{{ route('admin.berita.index') }}" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('admin/berita*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Kelola Berita</a>
                    
                    {{-- PERBAIKAN: Menggunakan admin.kegiatan.index --}}
                    <a href="{{ route('admin.kegiatan.index') }}" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('admin/kegiatan*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Kelola Kegiatan</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="pt-2">
                        @csrf
                        <button type="submit" class="w-full text-center bg-red-50 text-red-600 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest">Logout</button>
                    </form>
                @else
                    <a href="/" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('/') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Beranda</a>
                    <a href="/kegiatan-publik" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('kegiatan-publik') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Kegiatan</a>
                    <a href="/faq" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('faq') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">FAQ</a>
                    <a href="/about" class="block px-4 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest {{ Request::is('about') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' }}">Tentang Kami</a>
                    <div class="pt-2">
                        <a href="/login" class="block text-center bg-blue-600 text-white py-3 rounded-xl text-[11px] font-black uppercase tracking-widest shadow-lg shadow-blue-200">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-5xl mx-auto px-4 mt-6">
                <div class="bg-white border border-emerald-100 p-4 rounded-2xl shadow-xl shadow-emerald-100/50 flex items-center gap-3">
                    <div class="bg-emerald-500 p-1.5 rounded-lg text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-[11px] font-black uppercase tracking-widest text-emerald-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="max-w-6xl mx-auto px-4 py-8">
            @yield('content')
        </div>
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-8">
        <div class="max-w-5xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="md:col-span-2">
                    <a href="/" class="text-xl font-black text-white tracking-tighter uppercase mb-6 block">BENGKURINGKU</a>
                </div>
                <div>
                    <h4 class="text-white font-black text-[10px] uppercase tracking-[0.2em] mb-6">Navigasi</h4>
                    <ul class="space-y-4">
                        <li><a href="/" class="text-gray-500 hover:text-blue-500 text-[10px] font-black transition-colors uppercase tracking-widest">Beranda</a></li>
                        <li><a href="/kegiatan-publik" class="text-gray-500 hover:text-blue-500 text-[10px] font-black transition-colors uppercase tracking-widest">Agenda</a></li>
                        <li><a href="/faq" class="text-gray-500 hover:text-blue-500 text-[10px] font-black transition-colors uppercase tracking-widest">FAQ</a></li>
                        <li><a href="/about" class="text-gray-500 hover:text-blue-500 text-[10px] font-black transition-colors uppercase tracking-widest">Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black text-[10px] uppercase tracking-[0.2em] mb-6">Bantuan</h4>
                    <a href="mailto:admin@desa.id" class="text-white font-black text-[9px] uppercase tracking-widest bg-blue-600 px-4 py-2.5 rounded-xl block text-center hover:bg-blue-500 transition-all shadow-lg shadow-blue-500/20">Hubungi Kami</a>
                </div>
            </div>
            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-[9px] font-black uppercase tracking-widest">
                    &copy; {{ date('Y') }} BENGKURINGKU. All Rights Reserved.
                </p>
                <span class="text-gray-700 text-[9px] font-black uppercase tracking-tighter italic">Laravel & Tailwind CSS</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const swaltConfig = {
            confirmButtonColor: '#2563eb',
            customClass: {
                popup: 'rounded-[2rem] border-none shadow-2xl',
                confirmButton: 'rounded-xl px-6 py-2.5 text-[10px] font-black uppercase tracking-widest'
            }
        };

        @if(session('success'))
            Swal.fire({ ...swaltConfig, title: 'BERHASIL', text: "{{ session('success') }}", icon: 'success' });
        @endif

        @if($errors->any())
            Swal.fire({ ...swaltConfig, title: 'KESALAHAN', text: "Mohon periksa kembali inputan Anda.", icon: 'error' });
        @endif

        const btn = document.getElementById('mobile-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    </script>
</body>
</html>