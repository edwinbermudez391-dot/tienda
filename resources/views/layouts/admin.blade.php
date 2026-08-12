<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'URBAN HAUS — Panel')</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#111210; --panel:#1b1d1a; --paper:#f3f2ec; --silver:#a5aaa6; --lime:#c8ff00; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); }
        .mono { font-family:"Space Mono",monospace; }
        .lime-action { background:var(--lime); color:#111210; transition:transform .22s ease, box-shadow .22s ease; }
        .lime-action:hover { transform:translateY(-2px); box-shadow:0 14px 34px rgba(200,255,0,.2); }
        .line-action { border:1px solid rgba(243,242,236,.3); transition:border-color .2s ease, background .2s ease; }
        .line-action:hover { border-color:var(--lime); background:rgba(200,255,0,.08); }
        .table-row { transition:background .2s ease; }
        .table-row:hover { background:rgba(200,255,0,.04); }
        @media (max-width:767px) {
            .desktop-table { display:none; }
            .mobile-cards { display:block; }
        }
        @media (min-width:768px) {
            .desktop-table { display:table; }
            .mobile-cards { display:none; }
        }
        @yield('styles')
    </style>
</head>
<body class="min-h-screen">
    <header class="border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8 py-4 gap-3">
            <a href="{{ route('prendas.index') }}" class="flex items-center gap-2 sm:gap-3 flex-shrink-0">
                <span class="h-2.5 w-2.5 sm:h-3 sm:w-3 rotate-45 bg-[#c8ff00]"></span>
                <span class="mono font-bold tracking-[-.1em] text-base sm:text-lg md:text-xl text-[#f3f2ec]">URBAN HAUS.</span>
            </a>
            <div class="flex items-center gap-2 sm:gap-4 flex-shrink-0">
                <a href="{{ route('prendas.index') }}" class="line-action rounded-full px-2 py-1.5 text-[10px] uppercase tracking-wider sm:px-4 sm:py-2 sm:text-xs sm:normal-case font-bold text-[#f3f2ec]">Ver exhibidor</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-full border border-red-500/30 bg-red-500/10 px-2 py-1.5 text-[10px] uppercase tracking-wider sm:px-4 sm:py-2 sm:text-xs sm:normal-case font-bold text-red-400 transition hover:border-red-500 hover:bg-red-500/20">Cerrar sesión</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-10 md:px-8 md:py-14">
        @yield('content')
    </main>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('scripts')
</body>
</html>
