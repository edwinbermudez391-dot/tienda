<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'URBAN HAUS') }}</title>

    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#111210; --panel:#1b1d1a; --paper:#f3f2ec; --silver:#a5aaa6; --lime:#c8ff00; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); }
        .mono { font-family:"Space Mono",monospace; }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-5 py-10">
        <div class="mb-8">
            <a href="/" class="flex items-center gap-3">
                <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
                <span class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-[#1b1d1a] border border-white/10 rounded-2xl shadow-xl">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
