<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN HAUS — Panel de Control</title>
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
    </style>
</head>
<body class="min-h-screen">
    <header class="border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-8 gap-3">
            <a href="{{ route('prendas.index') }}" class="flex items-center gap-3 flex-shrink-0">
                <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
                <span class="mono font-bold tracking-[-.1em] text-lg md:text-xl text-[#f3f2ec]">URBAN HAUS.</span>
            </a>
            <div class="flex items-center gap-2 sm:gap-3 flex-shrink-0">
                <a href="{{ route('prendas.index') }}" class="line-action rounded-full px-3 sm:px-5 py-2 sm:py-2.5 text-xs sm:text-sm font-bold text-[#f3f2ec]">Ver exhibidor</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-full border border-red-500/30 bg-red-500/10 px-3 sm:px-5 py-2 sm:py-2.5 text-xs sm:text-sm font-bold text-red-400 transition hover:border-red-500 hover:bg-red-500/20">Cerrar sesión</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-10 md:px-8 md:py-14">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div>
                <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">01 / PANEL DE CONTROL</p>
                <h1 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-3xl text-[#f3f2ec] md:text-4xl">Archivo de piezas.</h1>
            </div>
            <a href="{{ route('prendas.create') }}" class="lime-action rounded-full px-6 py-3.5 text-sm font-bold text-center">
                + Registrar Nueva Prenda
            </a>
        </div>

        @if(session('success'))
        <div id="flash-alert" class="mt-8 flex items-center gap-3 rounded-lg border border-[#c8ff00]/30 bg-[#1b1d1a] px-5 py-4 shadow-lg shadow-[#c8ff00]/5 transition-opacity duration-500">
            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#c8ff00] text-[#111210]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </span>
            <p class="mono text-sm text-[#c8ff00]">{{ session('success') }}</p>
            <button onclick="document.getElementById('flash-alert').style.opacity='0';setTimeout(()=>document.getElementById('flash-alert').remove(),500)" class="ml-auto text-[#a5aaa6] hover:text-[#f3f2ec] transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <script>setTimeout(()=>{const el=document.getElementById('flash-alert');if(el){el.style.opacity='0';setTimeout(()=>el.remove(),500)}},4000);</script>
        @endif

        <div class="mt-10 overflow-hidden rounded-2xl border border-white/10 bg-[#1b1d1a]">
            <div class="overflow-x-auto">
                <table class="desktop-table w-full text-left min-w-[640px]">
                    <thead class="border-b border-white/10 bg-[#111210]">
                        <tr>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4">Imagen</th>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4">Título</th>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4">Precio</th>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4">Talla</th>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4">Estado</th>
                            <th class="mono text-[10px] font-bold uppercase tracking-[.14em] text-[#a5aaa6] px-5 py-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                <tbody>
                    @forelse($prendas as $prenda)
                    <tr class="table-row border-b border-white/5 last:border-b-0">
                        <td class="px-5 py-4">
                            <div class="h-14 w-14 flex-shrink-0 overflow-hidden rounded-md border border-white/10 bg-[#111210]">
                                <img src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" class="h-full w-full object-cover object-center" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            <p class="font-bold text-[#f3f2ec]">{{ $prenda->titulo }}</p>
                            <p class="mt-1 text-xs text-[#a5aaa6] line-clamp-1">{{ $prenda->descripcion }}</p>
                        </td>
                        <td class="px-5 py-4 mono font-bold text-[#c8ff00]">$ {{ number_format($prenda->precio, 0, ',', '.') }}</td>
                        <td class="px-5 py-4">
                            <span class="mono text-xs px-3 py-1 rounded-full bg-white/10 text-white font-bold">{{ $prenda->talla }}</span>
                        </td>
                        <td class="px-5 py-4">
                            @php
                                $estadoColors = [
                                    'disponible' => 'bg-[#c8ff00]/15 text-[#c8ff00] border-[#c8ff00]/30',
                                    'reservado' => 'bg-yellow-500/15 text-yellow-400 border-yellow-500/30',
                                    'vendido' => 'bg-red-500/15 text-red-400 border-red-500/30',
                                ];
                                $color = $estadoColors[$prenda->estado] ?? 'bg-white/10 text-white border-white/20';
                            @endphp
                            <span class="mono text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full border {{ $color }}">
                                {{ $prenda->estado }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('prendas.edit', $prenda) }}" class="line-action rounded-lg px-4 py-2 text-xs font-bold text-[#f3f2ec]">Editar</a>
                                <form action="{{ route('prendas.destroy', $prenda) }}" method="POST" onsubmit="return confirm('¿Eliminar esta prenda del archivo?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-2 text-xs font-bold text-red-400 transition hover:border-red-500 hover:bg-red-500/20">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-16 text-center text-[#a5aaa6]">
                            <p class="mono text-sm">No hay prendas registradas en el archivo actual.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>

            <div class="mobile-cards divide-y divide-white/5">
                @forelse($prendas as $prenda)
                <div class="p-5">
                    <div class="flex gap-4">
                        <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-white/10 bg-[#111210]">
                            <img src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" class="h-full w-full object-cover object-center" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-[#f3f2ec] truncate">{{ $prenda->titulo }}</p>
                            <p class="mono font-bold text-[#c8ff00] mt-1">$ {{ number_format($prenda->precio, 0, ',', '.') }}</p>
                            <div class="mt-2 flex items-center gap-2">
                                <span class="mono text-[10px] px-2 py-0.5 rounded-full bg-white/10 text-white font-bold">{{ $prenda->talla }}</span>
                                @php
                                    $estadoColors = [
                                        'disponible' => 'bg-[#c8ff00]/15 text-[#c8ff00] border-[#c8ff00]/30',
                                        'reservado' => 'bg-yellow-500/15 text-yellow-400 border-yellow-500/30',
                                        'vendido' => 'bg-red-500/15 text-red-400 border-red-500/30',
                                    ];
                                    $color = $estadoColors[$prenda->estado] ?? 'bg-white/10 text-white border-white/20';
                                @endphp
                                <span class="mono text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full border {{ $color }}">{{ $prenda->estado }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-2">
                        <a href="{{ route('prendas.edit', $prenda) }}" class="line-action flex-1 rounded-lg px-4 py-2 text-xs font-bold text-[#f3f2ec] text-center">Editar</a>
                        <form action="{{ route('prendas.destroy', $prenda) }}" method="POST" onsubmit="return confirm('¿Eliminar esta prenda del archivo?');" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-2 text-xs font-bold text-red-400 transition hover:border-red-500 hover:bg-red-500/20">Eliminar</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="px-5 py-16 text-center text-[#a5aaa6]">
                    <p class="mono text-sm">No hay prendas registradas en el archivo actual.</p>
                </div>
                @endforelse
            </div>
        </div>

        <div class="mt-8 border-t border-white/10 pt-6">
            <p class="mono text-xs text-[#a5aaa6]">{{ $prendas->count() }} pieza{{ $prendas->count() !== 1 ? 's' : '' }} en el archivo</p>
        </div>
    </main>
</body>
</html>
