<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIKUTA') - PT SPINDO Tbk Unit 7</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full bg-steel-50 font-sans text-steel-800 antialiased">
    <div class="flex h-full">

        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col bg-steel-900 text-white transition-transform duration-300 lg:translate-x-0 -translate-x-full">
            {{-- Brand --}}
            <div class="flex items-center gap-3 border-b border-steel-700/50 px-5 py-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-spindo-600 font-extrabold text-sm">
                    SP
                </div>
                <div>
                    <h1 class="text-sm font-bold tracking-wide">SIKUTA</h1>
                    <p class="text-[10px] text-steel-400">PT SPINDO Tbk · Unit 7</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-widest text-steel-500">Menu Utama</p>

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    Dashboard
                </a>

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-steel-500">Inventaris</p>

                <a href="{{ route('master.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('master.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75"/></svg>
                    Master Data
                </a>

                @if(Route::has('materials.index'))
                <a href="{{ route('materials.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('materials.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"/></svg>
                    Kode Material
                </a>
                @endif

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-steel-500">Transaksi</p>

                @if(Route::has('transactions.index'))
                <a href="{{ route('transactions.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('transactions.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                    History Transaksi
                </a>
                @endif

                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-steel-500">Stock Opname</p>

                @if(Route::has('opname-periods.index'))
                <a href="{{ route('opname-periods.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('opname-periods.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15a2.25 2.25 0 0 1 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                    Periode Opname
                </a>
                @endif

                <a href="{{ route('report.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('report.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    Laporan
                </a>

                @auth
                @if(Auth::user()->isAdmin())
                <p class="mb-2 mt-5 px-3 text-[10px] font-semibold uppercase tracking-widest text-steel-500">Admin</p>

                @if(Route::has('users.index'))
                <a href="{{ route('users.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('users.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    Manajemen User
                </a>
                @endif

                @if(Route::has('partners.index'))
                <a href="{{ route('partners.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-all duration-200 {{ request()->routeIs('partners.*') ? 'bg-spindo-600 text-white font-semibold shadow-lg shadow-spindo-600/20' : 'text-steel-300 hover:bg-steel-800 hover:text-white' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3H21"/></svg>
                    Partner
                </a>
                @endif
                @endif
                @endauth
            </nav>

            {{-- User Info --}}
            @auth
            <div class="border-t border-steel-700/50 px-4 py-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-spindo-600/20 text-sm font-bold text-spindo-400">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="truncate text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-steel-400 capitalize">{{ Auth::user()->role }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" title="Logout" class="rounded-lg p-1.5 text-steel-400 transition-colors hover:bg-steel-800 hover:text-spindo-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </aside>

        {{-- Sidebar Overlay (mobile) --}}
        <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/50 backdrop-blur-sm lg:hidden hidden" onclick="toggleSidebar()"></div>

        {{-- Main Content --}}
        <div class="flex flex-1 flex-col lg:pl-64">
            {{-- Top Bar --}}
            <header class="sticky top-0 z-20 flex items-center gap-4 border-b border-steel-200 bg-white/80 px-4 py-3 backdrop-blur-xl lg:px-6">
                <button onclick="toggleSidebar()" class="rounded-lg p-2 text-steel-500 transition-colors hover:bg-steel-100 lg:hidden">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                </button>

                <div class="flex-1">
                    <h2 class="text-lg font-bold text-steel-900">@yield('page-title', 'Dashboard')</h2>
                    <p class="text-xs text-steel-500">@yield('page-subtitle', 'SIKUTA Inventaris Tahap 1')</p>
                </div>

                <div class="flex items-center gap-2">
                    <span class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-[11px] font-medium text-green-700 ring-1 ring-green-600/10">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-500 animate-pulse"></span>
                        Online
                    </span>
                </div>
            </header>

            {{-- Flash Messages --}}
            <div class="px-4 lg:px-6">
                @if(session('success'))
                <div class="mt-4 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-sm" id="flash-success">
                    <svg class="h-5 w-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    <span class="flex-1">{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-green-600">&times;</button>
                </div>
                @endif

                @if(session('error'))
                <div class="mt-4 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-sm">
                    <svg class="h-5 w-5 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126Z"/></svg>
                    <span class="flex-1">{{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600">&times;</button>
                </div>
                @endif

                @if($errors->any())
                <div class="mt-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-sm">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            {{-- Page Content --}}
            <main class="flex-1 px-4 py-6 lg:px-6">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="border-t border-steel-200 px-4 py-3 text-center text-xs text-steel-400 lg:px-6">
                &copy; {{ date('Y') }} PT Steel Pipe Industry of Indonesia, Tbk · SIKUTA v2.0
            </footer>
        </div>
    </div>

    {{-- Sidebar Toggle Script --}}
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Auto-hide flash messages
        setTimeout(() => {
            const flash = document.getElementById('flash-success');
            if (flash) flash.style.transition = 'opacity 0.5s', flash.style.opacity = '0', setTimeout(() => flash.remove(), 500);
        }, 4000);
    </script>

    @stack('scripts')
</body>
</html>
