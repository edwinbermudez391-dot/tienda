<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>URBAN HAUS — {{ $prenda->titulo }}</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root { --ink:#111210; --panel:#1b1d1a; --paper:#f3f2ec; --silver:#a5aaa6; --lime:#c8ff00; }
    * { box-sizing:border-box; }
    html { scroll-behavior:smooth; }
    body { margin:0; width:100%; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); }
    .mono { font-family:"Space Mono",monospace; }
    .lime-action { background:var(--lime); color:#111210; transition:transform .22s ease, box-shadow .22s ease; }
    .lime-action:hover { transform:translateY(-2px); box-shadow:0 14px 34px rgba(200,255,0,.2); }
    .line-action { border:1px solid rgba(243,242,236,.3); transition:border-color .2s ease, background .2s ease; }
    .line-action:hover { border-color:var(--lime); background:rgba(200,255,0,.08); }
    .zoom-image { transition:transform .6s ease; }
    .zoom-container:hover .zoom-image { transform:scale(1.05); }
    @media (max-width:767px) { .desktop-nav { display:none; } }
    @media (min-width:768px) { .mobile-toggle,.mobile-menu { display:none; } }
  </style>
</head>
<body class="w-full overflow-x-hidden">
  <header class="sticky top-0 z-40 border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-8">
      <a href="{{ route('prendas.index') }}" class="flex items-center gap-3">
        <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</span>
      </a>
      <a href="{{ route('prendas.index') }}" class="line-action rounded-full px-5 py-2.5 text-sm font-bold text-[#f3f2ec]">← Volver al catálogo</a>
    </nav>
  </header>

  <main class="mx-auto max-w-7xl px-5 py-10 md:px-8 md:py-16">
    <div class="mb-8">
      <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">DETALLE / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">
      <div class="zoom-container w-full h-auto max-h-[80vh] overflow-hidden rounded-xl border border-white/10 bg-zinc-900/50">
        <img src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" class="zoom-image w-full h-full object-contain" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
      </div>

      <div class="flex flex-col">
        <div class="mb-6">
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
        </div>

        <h1 class="font-bold uppercase leading-[.9] tracking-[-.05em] text-3xl text-[#f3f2ec] md:text-4xl lg:text-5xl">
          {{ $prenda->titulo }}
        </h1>

        <div class="mt-6 flex items-baseline gap-3">
          <span class="mono font-bold text-[#c8ff00] text-4xl md:text-5xl">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
        </div>

        <div class="mt-8 grid grid-cols-2 gap-4">
          <div class="rounded-lg border border-white/10 bg-[#1b1d1a] p-4">
            <p class="mono text-[10px] tracking-[.14em] text-[#a5aaa6] uppercase mb-1">Talla</p>
            <p class="mono font-bold text-[#f3f2ec] text-lg">{{ $prenda->talla }}</p>
          </div>
          <div class="rounded-lg border border-white/10 bg-[#1b1d1a] p-4">
            <p class="mono text-[10px] tracking-[.14em] text-[#a5aaa6] uppercase mb-1">Código</p>
            <p class="mono font-bold text-[#f3f2ec] text-lg">UH-04/{{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
          </div>
        </div>

        @if($prenda->descripcion)
        <div class="mt-8">
          <p class="mono text-xs tracking-[.14em] text-[#c8ff00] font-bold mb-3">DESCRIPCIÓN</p>
          <p class="text-[#a5aaa6] leading-relaxed">{{ $prenda->descripcion }}</p>
        </div>
        @endif

        <div class="mt-10 flex flex-col gap-3 sm:flex-row">
          <a href="https://wa.me/573000000000?text=Hola%2C%20me%20interesa%20la%20prenda%20%22{{ urlencode($prenda->titulo) }}%22%20(UH-04%2F{{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }})" target="_blank" rel="noopener" class="lime-action flex items-center justify-center gap-2 rounded-full px-6 py-4 text-sm font-bold">
            <i data-lucide="message-circle" class="h-4 w-4"></i>
            Reservar / Consultar por WhatsApp
          </a>
        </div>

        <div class="mt-8 border-t border-white/10 pt-6">
          <p class="text-xs text-[#a5aaa6] leading-relaxed">
            Pieza única disponible en Bogotá. Envíos nacionales bajo consulta. 
            Para reservar, contáctanos directamente por WhatsApp con el código de la prenda.
          </p>
        </div>
      </div>
    </div>
  </main>

  <footer class="border-t border-white/10 px-5 py-10 md:px-8 bg-[#1b1d1a]">
    <div class="mx-auto max-w-7xl flex flex-col items-center gap-4 md:flex-row md:justify-between">
      <p class="mono font-bold tracking-[-.1em] text-lg text-[#f3f2ec]">URBAN HAUS.</p>
      <a href="{{ route('prendas.index') }}" class="text-sm text-[#a5aaa6] hover:text-[#c8ff00] transition-colors">← Volver al catálogo</a>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
    });
  </script>
</body>
</html>
