<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIKUTA · PT SPINDO Tbk</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-steel-950 font-sans antialiased">

    <div class="flex min-h-full">
        {{-- Left: Decorative Panel --}}
        <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 relative overflow-hidden">
            {{-- Gradient Background --}}
            <div class="absolute inset-0 bg-gradient-to-br from-spindo-700 via-spindo-800 to-steel-900"></div>

            {{-- Grid Pattern --}}
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cpath d=&quot;M 60 0 L 0 0 0 60&quot; fill=&quot;none&quot; stroke=&quot;white&quot; stroke-width=&quot;0.5&quot;/%3E%3C/svg%3E');"></div>

            {{-- Floating Elements --}}
            <div class="absolute top-20 left-20 h-72 w-72 rounded-full bg-spindo-500/20 blur-3xl animate-pulse"></div>
            <div class="absolute bottom-32 right-20 h-96 w-96 rounded-full bg-spindo-600/15 blur-3xl animate-pulse" style="animation-delay: 1s"></div>

            {{-- Content --}}
            <div class="relative z-10 flex flex-col justify-center px-16 xl:px-24">
                <div class="flex items-center gap-4 mb-8">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 backdrop-blur-sm text-white font-black text-xl border border-white/10">
                        SP
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">SIKUTA</h2>
                        <p class="text-sm text-spindo-200">Sistem Inventaris & Kontrol Utama</p>
                    </div>
                </div>

                <h1 class="text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-6">
                    Sistem Inventaris<br>
                    <span class="text-spindo-300">PT SPINDO Tbk</span><br>
                    Unit 7 Gresik
                </h1>

                <p class="text-steel-300 text-lg leading-relaxed max-w-lg mb-10">
                    Kelola stok gudang pipa baja dengan efisien. Pantau penerimaan, muat, transfer, dan stock opname secara real-time.
                </p>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-4 max-w-md">
                    <div class="rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 p-4">
                        <p class="text-2xl font-extrabold text-white">4</p>
                        <p class="text-xs text-steel-400 mt-1">Gudang</p>
                    </div>
                    <div class="rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 p-4">
                        <p class="text-2xl font-extrabold text-white">144</p>
                        <p class="text-xs text-steel-400 mt-1">Blok</p>
                    </div>
                    <div class="rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 p-4">
                        <p class="text-2xl font-extrabold text-white">24/7</p>
                        <p class="text-xs text-steel-400 mt-1">Monitoring</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: Login Form --}}
        <div class="flex w-full flex-col justify-center px-6 py-12 lg:w-1/2 xl:w-2/5">
            <div class="mx-auto w-full max-w-sm">
                {{-- Mobile Logo --}}
                <div class="mb-10 lg:hidden">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-spindo-600 text-white font-black text-lg">
                            SP
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">SIKUTA</h2>
                            <p class="text-xs text-steel-400">PT SPINDO Tbk · Unit 7</p>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-white">Masuk ke Sistem</h2>
                    <p class="mt-2 text-sm text-steel-400">Gunakan akun yang sudah terdaftar</p>
                </div>

                @if($errors->any())
                <div class="mb-6 rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                    <div class="flex items-center gap-2">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                        {{ $errors->first() }}
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-steel-300 mb-1.5">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                               class="w-full rounded-xl border border-steel-700 bg-steel-800/50 px-4 py-3 text-sm text-white placeholder-steel-500 transition-all duration-200 focus:border-spindo-500 focus:bg-steel-800 focus:outline-none focus:ring-2 focus:ring-spindo-500/20"
                               placeholder="nama@spindo.com">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-steel-300 mb-1.5">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" required
                                   class="w-full rounded-xl border border-steel-700 bg-steel-800/50 px-4 py-3 text-sm text-white placeholder-steel-500 transition-all duration-200 focus:border-spindo-500 focus:bg-steel-800 focus:outline-none focus:ring-2 focus:ring-spindo-500/20"
                                   placeholder="••••••••">
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-steel-500 hover:text-steel-300 transition-colors">
                                <svg id="eye-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-steel-600 bg-steel-800 text-spindo-600 focus:ring-spindo-500/20">
                            <span class="text-sm text-steel-400">Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit"
                            class="w-full rounded-xl bg-spindo-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-spindo-600/25 transition-all duration-200 hover:bg-spindo-700 hover:shadow-spindo-600/40 active:scale-[0.98]">
                        Masuk
                    </button>
                </form>

                <p class="mt-10 text-center text-xs text-steel-600">
                    &copy; {{ date('Y') }} PT Steel Pipe Industry of Indonesia, Tbk
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
