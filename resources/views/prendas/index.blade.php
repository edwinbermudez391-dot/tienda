<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>URBAN HAUS — Exposición 04</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Space+Mono:wght@400;700&amp;display=swap" rel="stylesheet">
  <style>
    :root { --ink:#111210; --panel:#1b1d1a; --paper:#f3f2ec; --silver:#a5aaa6; --lime:#c8ff00; }
    * { box-sizing:border-box; max-width:100%; }
    .ticker { max-width:none; }
    html { scroll-behavior:smooth; overflow-x:hidden; }
    body { margin:0; width:100%; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); overflow-x:hidden; }
    .mono { font-family:"Space Mono",monospace; }
    .grid-surface { background-image:linear-gradient(rgba(200,255,0,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(200,255,0,.05) 1px,transparent 1px); background-size:42px 42px; }
    .glass { background:rgba(27,29,26,.76); border:1px solid rgba(243,242,236,.13); backdrop-filter:blur(18px); }
    .lime-action { background:var(--lime); color:#111210; transition:transform .22s ease, box-shadow .22s ease; }
    .lime-action:hover { transform:translateY(-2px); box-shadow:0 14px 34px rgba(200,255,0,.2); }
    .line-action { border:1px solid rgba(243,242,236,.3); transition:border-color .2s ease, background .2s ease; }
    .line-action:hover { border-color:var(--lime); background:rgba(200,255,0,.08); }
    .piece-card { transition:transform .3s ease, border-color .3s ease, box-shadow .3s ease; }
    .piece-card:hover { transform:translateY(-7px); border-color:rgba(200,255,0,.55); box-shadow:0 25px 50px rgba(0,0,0,.34); }
    .piece-card:hover .piece-image { transform:scale(1.045); }
    .piece-image { transition:transform .6s ease; }
    .filter-chip { transition:background .2s ease,color .2s ease,border-color .2s ease; }
    .filter-chip.active { background:var(--lime); color:#111210; border-color:var(--lime); }
    .ticker { animation:marquee 22s linear infinite; }
    @keyframes marquee { to { transform:translateX(-50%); } }
    .entry { animation:rise .75s ease both; }
    @keyframes rise { from { opacity:0; transform:translateY(18px); } to { opacity:1; transform:translateY(0); } }
    .style-wall { scrollbar-width:thin; scrollbar-color:#3f3f46 transparent; scroll-snap-type:x mandatory; }
    .style-wall::-webkit-scrollbar { height:6px; }
    .style-wall::-webkit-scrollbar-track { background:transparent; }
    .style-wall::-webkit-scrollbar-thumb { background:#3f3f46; border-radius:3px; transition:background .2s ease; }
    .style-wall::-webkit-scrollbar-thumb:hover { background:#c8ff00; }
    .style-frame { scroll-snap-align:center; }
    @media (max-width:767px) { .desktop-nav { display:none; } }
    @media (min-width:768px) { .mobile-toggle,.mobile-drawer,.drawer-overlay { display:none; } }
    
    /* Drawer Mobile Styles */
    .drawer-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(4px);
      z-index: 49;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
    }
    .drawer-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }
    .mobile-drawer {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      width: 85%;
      max-width: 320px;
      background: #1b1d1a;
      border-left: 1px solid rgba(243, 242, 236, 0.1);
      z-index: 50;
      transform: translateX(100%);
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      overflow-y: auto;
    }
    .mobile-drawer.active {
      transform: translateX(0);
    }
    .drawer-link {
      display: block;
      padding: 1rem 1.5rem;
      font-size: 0.875rem;
      font-weight: 600;
      color: #f3f2ec;
      text-decoration: none;
      border-bottom: 1px solid rgba(243, 242, 236, 0.05);
      transition: all 0.2s ease;
    }
    .drawer-link:hover {
      background: rgba(200, 255, 0, 0.08);
      color: #c8ff00;
      padding-left: 2rem;
    }
  </style>
</head>
<body class="w-full overflow-x-hidden" style="background: rgb(17, 18, 16);">
  <header class="sticky top-0 z-40 border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl overflow-hidden">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-5 py-3 sm:py-4 md:px-8" aria-label="Navegación principal">
      <a href="#inicio" class="flex items-center gap-2 sm:gap-3">
        <span class="h-2.5 w-2.5 sm:h-3 sm:w-3 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-lg sm:text-xl text-[#f3f2ec]">URBAN HAUS.</span>
      </a>
      <div class="desktop-nav flex items-center gap-7">
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#spotlight">Spotlight</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#coleccion">Exposición</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#muro">Muro de estilo</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#contacto">Contacto</a>
        @auth
        <a class="text-sm text-[#c8ff00] border border-[#c8ff00] px-4 py-1 rounded-full transition hover:bg-[#c8ff00] hover:text-[#111210]" href="{{ route('prendas.admin') }}">Panel Admin</a>
        @endauth
        <a class="lime-action rounded-full px-5 py-2.5 text-sm font-bold" href="#coleccion">Ver piezas</a>
      </div>
      <button id="menu-toggle" class="mobile-toggle rounded-full border border-white/20 p-1.5 sm:p-2" type="button" aria-label="Abrir menú">
        <i data-lucide="menu" class="h-4 w-4 sm:h-5 sm:w-5"></i>
      </button>
    </nav>
  </header>

  <!-- Drawer Overlay -->
  <div id="drawer-overlay" class="drawer-overlay"></div>

  <!-- Mobile Drawer -->
  <div id="mobile-drawer" class="mobile-drawer">
    <div class="flex items-center justify-between border-b border-white/10 px-5 py-4">
      <div class="flex items-center gap-2">
        <span class="h-2.5 w-2.5 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-lg text-[#f3f2ec]">URBAN HAUS.</span>
      </div>
      <button id="drawer-close" class="rounded-full border border-white/20 p-2 transition hover:border-[#c8ff00] hover:bg-[#c8ff00]/10" aria-label="Cerrar menú">
        <i data-lucide="x" class="h-4 w-4 text-[#f3f2ec]"></i>
      </button>
    </div>
    <nav class="flex flex-col py-4">
      <a class="drawer-link" href="#spotlight">
        <span class="mono text-[10px] tracking-[.18em] text-[#c8ff00] font-bold block mb-1">01</span>
        Spotlight
      </a>
      <a class="drawer-link" href="#coleccion">
        <span class="mono text-[10px] tracking-[.18em] text-[#c8ff00] font-bold block mb-1">02</span>
        Exposición
      </a>
      <a class="drawer-link" href="#muro">
        <span class="mono text-[10px] tracking-[.18em] text-[#c8ff00] font-bold block mb-1">03</span>
        Muro de Estilo
      </a>
      <a class="drawer-link" href="#contacto">
        <span class="mono text-[10px] tracking-[.18em] text-[#c8ff00] font-bold block mb-1">04</span>
        Contacto
      </a>
      @auth
      <a class="drawer-link" href="{{ route('prendas.admin') }}">
        <span class="mono text-[10px] tracking-[.18em] text-[#c8ff00] font-bold block mb-1">ADMIN</span>
        Panel de Control
      </a>
      @endauth
    </nav>
    <div class="px-5 py-6 border-t border-white/10">
      <a class="lime-action block rounded-full px-5 py-3 text-sm font-bold text-center" href="#coleccion">Ver piezas</a>
    </div>
  </div>

  <main class="w-full overflow-x-hidden">
    @if(session('success'))
    <div id="flash-alert" class="fixed top-20 left-1/2 z-50 flex w-[90vw] max-w-md -translate-x-1/2 items-center gap-3 rounded-lg border border-[#c8ff00]/30 bg-[#1b1d1a] px-4 sm:px-5 py-4 shadow-lg shadow-[#c8ff00]/5 transition-opacity duration-500">
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

    <!-- Hero Section -->
    <section id="inicio" class="grid-surface relative min-h-[calc(82*min(var(--vh,1vh),1vh))] overflow-hidden">
      <img loading="lazy" class="absolute inset-y-0 right-0 h-full w-full object-cover opacity-55 md:w-[62%]" src="https://images.pexels.com/photos/4903412/pexels-photo-4903412.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1920" alt="Interior tienda urbana">
      <div class="absolute inset-0 bg-gradient-to-r from-[#111210] via-[#111210]/90 to-[#111210]/10"></div>
      <div class="relative mx-auto flex min-h-[calc(82*min(var(--vh,1vh),1vh))] max-w-7xl items-end px-5 sm:px-6 md:px-8 pb-12 sm:pb-16 pt-20 sm:pt-24 md:items-center overflow-hidden">
        <div class="max-w-3xl">
          <p class="mono entry text-xs tracking-[.2em] text-[#c8ff00] font-bold">EXPOSICIÓN 04 / BOGOTÁ · 2026</p>
          <h1 class="entry mt-5 font-bold uppercase leading-[.84] tracking-[-.07em] text-3xl sm:text-4xl md:text-6xl text-[#f3f2ec]">LA CIUDAD VISTE EN CAPAS.</h1>
          <p class="entry mt-6 sm:mt-7 max-w-xl leading-relaxed text-white/70 md:text-lg">Una selección de siluetas, texturas y señales para recorrer la ciudad sin seguir el mismo mapa. Archivo vivo de lo que se mueve afuera.</p>
          <div class="entry mt-8 sm:mt-9 flex flex-wrap gap-3">
            <a class="lime-action rounded-full px-5 sm:px-6 py-3 sm:py-3.5 text-sm font-bold" href="#coleccion">Explorar exposición</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Ticker Section -->
    <section class="relative overflow-hidden border-y border-white/10 bg-[#c8ff00] py-3 text-[#111210]">
      <div class="ticker flex w-max gap-9 whitespace-nowrap mono text-xs font-bold tracking-[.14em]">
        <span>PIEZAS PARA EL MOVIMIENTO</span><span>✦</span>
        <span>FORMA / FUNCIÓN / FRICCIÓN</span><span>✦</span>
        <span>URBAN HAUS / EXHIBITION 04</span><span>✦</span>
        <span>HECHO PARA RECORRER</span><span>✦</span>
      </div>
    </section>

    <!-- Spotlight Section - Featured Pieces -->
    <section id="spotlight" class="border-t border-white/10 bg-[#111210] px-5 sm:px-6 py-16 sm:py-20 md:px-8 md:py-28">
      <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-6 sm:gap-7 md:flex-row md:items-end">
          <div>
            <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">01 / SPOTLIGHT</p>
            <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec] md:text-4xl">Piezas destacadas.</h2>
          </div>
          <p class="max-w-md leading-relaxed text-[#a5aaa6]">Selección curatorial de las piezas más icónicas de la colección. Ediciones limitadas y exclusivos del archivo.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3 lg:gap-8">
          @forelse($spotlightPrendas as $prenda)
          <div onclick="window.location.href='{{ route('prendas.show', $prenda->id) }}'" class="group relative block overflow-hidden rounded-2xl border border-white/10 bg-[#1b1d1a] cursor-pointer transition-all duration-300 hover:border-[#c8ff00]/50 hover:shadow-[0_20px_60px_rgba(200,255,0,0.15)]">
            <a href="{{ route('prendas.show', $prenda->id) }}" class="absolute inset-0 z-40">
              <span class="sr-only">Ver detalles de {{ $prenda->titulo }}</span>
            </a>
            <div class="relative h-56 sm:h-64 lg:h-72 w-full overflow-hidden">
              <img loading="lazy" class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-105" src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
              <div class="absolute inset-0 bg-gradient-to-t from-[#111210] via-transparent to-transparent opacity-60"></div>
              <span class="absolute left-3 top-3 sm:left-4 sm:top-4 z-50 rounded-full bg-[#c8ff00] px-2.5 py-1 sm:px-3 mono text-[9px] sm:text-[10px] font-bold text-[#111210]">{{ strtoupper($prenda->estado) }}</span>
              <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5">
                <p class="mono text-[9px] sm:text-[10px] tracking-[.14em] text-[#c8ff00]/80">UH-04 / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
                <h3 class="mt-1 font-bold text-base sm:text-lg text-[#f3f2ec]">{{ $prenda->titulo }}</h3>
              </div>
            </div>
            <div class="relative flex items-center justify-between border-t border-white/10 px-4 py-3 sm:px-5 sm:py-4">
              <span class="mono font-bold text-[#c8ff00] text-sm sm:text-base">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
              <span class="mono text-[11px] sm:text-xs text-[#a5aaa6]">{{ $prenda->categoria }}</span>
            </div>
          </div>
          @empty
          <div class="col-span-full py-16 text-center text-[#a5aaa6]">
            <p class="mono text-sm">No hay piezas destacadas disponibles.</p>
          </div>
          @endforelse
        </div>
      </div>
    </section>

    <!-- Dinamic Catalog Section (Conectado a la Base de Datos Laravel) -->
    <section id="coleccion" class="border-t border-white/10 mx-auto max-w-7xl px-5 sm:px-6 py-16 sm:py-20 md:px-8 md:py-28">
      <div class="flex flex-col justify-between gap-6 sm:gap-7 md:flex-row md:items-end">
        <div>
          <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">02 / CATÁLOGO CURATORIAL</p>
          <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec]">Piezas en tránsito.</h2>
        </div>
        <p class="max-w-md leading-relaxed text-[#a5aaa6]">Cada prenda aparece aquí como un fragmento de ciudad: diseñada para combinar y tensionar a tu manera.</p>
      </div>

      {{-- Category Filter Pills + Grid + Pagination --}}
      <div id="catalogo-contenedor">
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ route('prendas.index') }}#coleccion" class="filter-chip rounded-full border px-4 py-2 mono text-xs font-bold transition {{ !request('categoria') ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00]' : 'border-white/20 text-[#a5aaa6] hover:border-[#c8ff00] hover:text-[#c8ff00]' }}">
            Ver Todo
          </a>
          @foreach(['Camisetas','Hoodies','Pantalones','Accesorios','Chaquetas'] as $cat)
            <a href="{{ route('prendas.index', ['categoria' => $cat]) }}#coleccion" class="filter-chip rounded-full border px-4 py-2 mono text-xs font-bold transition {{ request('categoria') == $cat ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00]' : 'border-white/20 text-[#a5aaa6] hover:border-[#c8ff00] hover:text-[#c8ff00]' }}">
              {{ $cat }}
            </a>
          @endforeach
        </div>

        <!-- Cuadrícula dinámica de Prendas desde Laravel -->
        <div id="piece-grid" class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3 lg:gap-8">
          @forelse($prendas as $prenda)
          <div onclick="window.location.href='{{ route('prendas.show', $prenda->id) }}'" class="piece-card relative block overflow-hidden rounded-2xl border border-white/10 bg-[#1b1d1a] cursor-pointer">
            <a href="{{ route('prendas.show', $prenda->id) }}" class="absolute inset-0 z-40">
              <span class="sr-only">Ver detalles de {{ $prenda->titulo }}</span>
            </a>
            <div class="relative h-56 sm:h-64 lg:h-72 w-full overflow-hidden">
              <img loading="lazy" class="piece-image h-full w-full object-cover" src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
              <span class="absolute left-3 top-3 sm:left-4 sm:top-4 z-50 rounded-full bg-[#c8ff00] px-2.5 py-1 sm:px-3 mono text-[9px] sm:text-[10px] font-bold text-[#111210]">{{ strtoupper($prenda->estado) }}</span>
            </div>
            <div class="relative flex flex-col space-y-1.5 sm:space-y-2 p-4 sm:p-5">
              <p class="mono text-[9px] sm:text-[10px] tracking-[.14em] text-[#a5aaa6]">UH-04 / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
              <h3 class="font-bold text-base sm:text-lg text-[#f3f2ec] leading-snug">{{ $prenda->titulo }}</h3>
              <div class="flex items-center gap-2 sm:gap-3 pt-1">
                <span class="mono font-bold text-[#c8ff00] text-base sm:text-lg">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
                <span class="text-[11px] sm:text-sm text-gray-400">{{ $prenda->talla }}</span>
              </div>
              <div class="flex items-center gap-2 pt-0.5">
                <span class="text-xs sm:text-sm text-gray-400">{{ $prenda->categoria }}</span>
              </div>
              @if($prenda->descripcion)
              <p class="text-xs sm:text-sm leading-relaxed text-[#a5aaa6] line-clamp-2 pt-1">{{ $prenda->descripcion }}</p>
              @endif
            </div>
          </div>
          @empty
          <div class="col-span-full py-16 text-center text-[#a5aaa6]">
            <p class="mono text-sm">No hay prendas registradas en el archivo actual.</p>
          </div>
          @endforelse
        </div>

        <!-- Paginación -->
        <div class="mt-12">
          {{ $prendas->links('vendor.pagination.urban-haus') }}
        </div>
      </div>
    </section>

    <!-- Muro de Estilo Section -->
    <section id="muro" class="border-t border-white/10 px-5 sm:px-6 py-16 sm:py-20 md:px-8 md:py-28">
      <div class="mx-auto max-w-7xl overflow-hidden">
        <div class="flex flex-col justify-between gap-6 sm:gap-7 md:flex-row md:items-end">
          <div>
            <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">03 / MURO DE ESTILO</p>
            <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec]">La calle como pasarela.</h2>
          </div>
          <p class="max-w-md leading-relaxed text-[#a5aaa6]">Inspiración directa del street style. Looks que definen la actitud urbana contemporánea.</p>
        </div>

        <div class="style-wall mt-12 flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory">
          @foreach($muroPrendas as $prenda)
          <div onclick="window.location.href='{{ route('prendas.show', $prenda->id) }}'" class="group style-frame w-[75vw] sm:w-72 md:w-80 lg:w-[320px] h-[450px] md:h-[500px] shrink-0 snap-center cursor-pointer">
            <div class="relative w-full h-full overflow-hidden rounded-2xl border border-white/10 bg-[#1b1d1a] transition-all duration-300 hover:border-[#c8ff00]/50 hover:shadow-[0_20px_60px_rgba(200,255,0,0.15)]">
              <img loading="lazy" class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105" src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
              <div class="absolute inset-0 bg-gradient-to-t from-[#111210]/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4 right-4">
                <p class="mono text-[10px] tracking-[.14em] text-[#c8ff00] transition-all duration-300 group-hover:brightness-125 group-hover:text-[#d4ff33]">{{ $prenda->categoria }}</p>
                <p class="mt-1 font-bold text-sm text-[#f3f2ec] truncate">{{ $prenda->titulo }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="contacto" class="border-t border-zinc-800 px-5 sm:px-6 py-10 sm:py-16 md:px-8 bg-[#111210] overflow-hidden">
    <div class="mx-auto max-w-7xl">
      <div class="grid grid-cols-1 gap-8 sm:gap-10 md:grid-cols-3">
        <div>
          <p class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</p>
          <p class="mt-4 max-w-sm text-sm leading-relaxed text-gray-400">Un archivo de streetwear pensado desde Cali para quienes entienden la ropa como lenguaje, movimiento y memoria.</p>
        </div>
        <div>
          <h3 class="mono text-xs font-bold tracking-[.15em] text-[#c8ff00]">CONTACTO</h3>
          <div class="mt-6 flex flex-col gap-4">
            <a class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-[#c8ff00]" href="mailto:hola@urbanhaus.studio">
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              hola@urbanhaus.studio
            </a>
            <a class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-[#c8ff00]" href="https://wa.me/573000000000" target="_blank" rel="noopener">
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
              </svg>
              +57 300 000 0000
            </a>
          </div>
        </div>
        <div>
          <h3 class="mono text-xs font-bold tracking-[.15em] text-[#c8ff00]">REDES</h3>
          <div class="mt-6 flex flex-col gap-4">
            <a class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-[#c8ff00]" href="https://instagram.com/urbanhaus" target="_blank" rel="noopener">
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
              </svg>
              @urbanhaus
            </a>
            <a class="flex items-center gap-3 text-sm text-gray-400 transition-colors hover:text-[#c8ff00]" href="https://tiktok.com/@urbanhaus" target="_blank" rel="noopener">
              <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
              </svg>
              @urbanhaus
            </a>
          </div>
        </div>
      </div>
      <div class="mt-16 border-t border-zinc-800 pt-8 text-center">
        <p class="text-xs text-gray-500">© 2026 Urban Haus. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
      
      // Drawer Mobile Logic
      const toggle = document.getElementById('menu-toggle');
      const drawer = document.getElementById('mobile-drawer');
      const overlay = document.getElementById('drawer-overlay');
      const closeBtn = document.getElementById('drawer-close');
      
      function openDrawer() {
        drawer.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        lucide.createIcons();
      }
      
      function closeDrawer() {
        drawer.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      }
      
      toggle.addEventListener('click', openDrawer);
      closeBtn.addEventListener('click', closeDrawer);
      overlay.addEventListener('click', closeDrawer);
      
      // Cerrar drawer al hacer clic en un enlace
      drawer.querySelectorAll('.drawer-link').forEach(link => {
        link.addEventListener('click', () => {
          closeDrawer();
        });
      });

      // AJAX Navigation for catalog
      document.addEventListener('click', (e) => {
        const link = e.target.closest('#catalogo-contenedor a');
        if (!link) return;

        e.preventDefault();
        const href = link.getAttribute('href');
        const url = href.replace(/#coleccion$/, '');

        fetch(url, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');
          const newContent = doc.querySelector('#catalogo-contenedor');
          
          if (newContent) {
            document.getElementById('catalogo-contenedor').innerHTML = newContent.innerHTML;
            history.pushState(null, '', url);
            lucide.createIcons();
          }
        })
        .catch(error => console.error('Error:', error));
      });

      // Handle browser back/forward
      window.addEventListener('popstate', () => {
        const url = window.location.href;
        fetch(url, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');
          const newContent = doc.querySelector('#catalogo-contenedor');
          
          if (newContent) {
            document.getElementById('catalogo-contenedor').innerHTML = newContent.innerHTML;
            lucide.createIcons();
          }
        })
        .catch(error => console.error('Error:', error));
      });
    });
  </script>
</body>
</html>