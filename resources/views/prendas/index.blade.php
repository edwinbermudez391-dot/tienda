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
    * { box-sizing:border-box; }
    html { scroll-behavior:smooth; }
    body { margin:0; width:100%; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); }
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
    .style-wall { scrollbar-width:none; scroll-snap-type:x mandatory; }
    .style-wall::-webkit-scrollbar { display:none; }
    .style-frame { scroll-snap-align:start; }
    @media (max-width:767px) { .desktop-nav { display:none; } }
    @media (min-width:768px) { .mobile-toggle,.mobile-menu { display:none; } }
  </style>
</head>
<body class="w-full overflow-x-hidden" style="background: rgb(17, 18, 16);">
  <header class="sticky top-0 z-40 border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-8" aria-label="Navegación principal">
      <a href="#inicio" class="flex items-center gap-3">
        <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</span>
      </a>
      <div class="desktop-nav flex items-center gap-7">
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#coleccion">Exposición</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#spotlight">Spotlight</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#muro">Muro de estilo</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="#contacto">Contacto</a>
        <a class="lime-action rounded-full px-5 py-2.5 text-sm font-bold" href="#coleccion">Ver piezas</a>
      </div>
      <button id="menu-toggle" class="mobile-toggle rounded-full border border-white/20 p-2" type="button" aria-label="Abrir menú">
        <i data-lucide="menu" class="h-5 w-5"></i>
      </button>
    </nav>
    <div id="mobile-menu" class="mobile-menu hidden border-t border-white/10 px-5 py-5">
      <div class="flex flex-col gap-4">
        <a class="text-sm text-[#f3f2ec]" href="#coleccion">Exposición</a>
        <a class="text-sm text-[#f3f2ec]" href="#spotlight">Spotlight</a>
        <a class="text-sm text-[#f3f2ec]" href="#muro">Muro de estilo</a>
        <a class="text-sm text-[#f3f2ec]" href="#contacto">Contacto</a>
      </div>
    </div>
  </header>

  <main>
    @if(session('success'))
    <div id="flash-alert" class="fixed top-20 left-1/2 z-50 flex -translate-x-1/2 items-center gap-3 rounded-lg border border-[#c8ff00]/30 bg-[#1b1d1a] px-5 py-4 shadow-lg shadow-[#c8ff00]/5 transition-opacity duration-500">
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
      <div class="relative mx-auto flex min-h-[calc(82*min(var(--vh,1vh),1vh))] max-w-7xl items-end px-5 pb-16 pt-24 md:items-center md:px-8">
        <div class="max-w-3xl">
          <p class="mono entry text-xs tracking-[.2em] text-[#c8ff00] font-bold">EXPOSICIÓN 04 / BOGOTÁ · 2026</p>
          <h1 class="entry mt-5 font-bold uppercase leading-[.84] tracking-[-.07em] text-4xl md:text-6xl text-[#f3f2ec]">LA CIUDAD VISTE EN CAPAS.</h1>
          <p class="entry mt-7 max-w-xl leading-relaxed text-white/70 md:text-lg">Una selección de siluetas, texturas y señales para recorrer la ciudad sin seguir el mismo mapa. Archivo vivo de lo que se mueve afuera.</p>
          <div class="entry mt-9 flex flex-wrap gap-3">
            <a class="lime-action rounded-full px-6 py-3.5 text-sm font-bold" href="#coleccion">Explorar exposición</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Ticker Section -->
    <section class="overflow-hidden border-y border-white/10 bg-[#c8ff00] py-3 text-[#111210]">
      <div class="ticker flex w-max gap-9 whitespace-nowrap mono text-xs font-bold tracking-[.14em]">
        <span>PIEZAS PARA EL MOVIMIENTO</span><span>✦</span>
        <span>FORMA / FUNCIÓN / FRICCIÓN</span><span>✦</span>
        <span>URBAN HAUS / EXHIBITION 04</span><span>✦</span>
        <span>HECHO PARA RECORRER</span><span>✦</span>
      </div>
    </section>

    <!-- Dinamic Catalog Section (Conectado a la Base de Datos Laravel) -->
    <section id="coleccion" class="mx-auto max-w-7xl px-5 py-20 md:px-8 md:py-28">
      <div class="flex flex-col justify-between gap-7 md:flex-row md:items-end">
        <div>
          <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">01 / CATÁLOGO CURATORIAL</p>
          <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-3xl text-[#f3f2ec]">Piezas en tránsito.</h2>
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
        <div id="piece-grid" class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @forelse($prendas as $prenda)
          <a href="{{ route('prendas.show', $prenda) }}" class="piece-card block overflow-hidden rounded-2xl border border-white/10 bg-[#1b1d1a] cursor-pointer">
            <div class="relative aspect-[4/5] overflow-hidden">
              @if($prenda->imagen)
                <img loading="lazy" class="piece-image h-full w-full object-cover" src="{{ asset('storage/' . $prenda->imagen) }}" alt="{{ $prenda->titulo }}">
              @else
                <img loading="lazy" class="piece-image h-full w-full object-cover" src="https://images.pexels.com/photos/28701952/pexels-photo-28701952.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=800" alt="{{ $prenda->titulo }}">
              @endif
              <span class="absolute left-4 top-4 rounded-full bg-[#c8ff00] px-3 py-1 mono text-[10px] font-bold text-[#111210]">{{ strtoupper($prenda->estado) }}</span>
            </div>
            <div class="p-5">
              <p class="mono text-[10px] tracking-[.14em] text-[#a5aaa6]">UH-04 / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
              <h3 class="mt-2 font-bold text-lg text-[#f3f2ec]">{{ $prenda->titulo }}</h3>
              <p class="mt-2 text-sm leading-relaxed text-[#a5aaa6]">{{ $prenda->descripcion }}</p>
              <div class="mt-4 flex items-center justify-between border-t border-white/10 pt-4">
                <span class="mono font-bold text-[#c8ff00] text-lg">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
                <span class="mono text-xs px-3 py-1 rounded-full bg-white/10 text-white font-bold">Talla: {{ $prenda->talla }}</span>
              </div>
            </div>
          </a>
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
  </main>

  <!-- Footer -->
  <footer id="contacto" class="border-t border-white/10 px-5 py-14 md:px-8 bg-[#1b1d1a]">
    <div class="mx-auto grid max-w-7xl gap-10 md:grid-cols-[1.5fr_1fr_1fr_1fr]">
      <div>
        <p class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</p>
        <p class="mt-4 max-w-sm text-sm leading-relaxed text-[#a5aaa6]">Un archivo de streetwear pensado desde Bogotá para quienes entienden la ropa como lenguaje, movimiento y memoria.</p>
      </div>
      <div>
        <h3 class="mono text-xs font-bold tracking-[.15em] text-[#c8ff00]">CONTACTO</h3>
        <a class="mt-4 block text-sm text-white/70 hover:text-[#c8ff00]" href="mailto:hola@urbanhaus.studio">hola@urbanhaus.studio</a>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
      const toggle = document.getElementById('menu-toggle');
      const menu = document.getElementById('mobile-menu');
      toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('hidden') === false;
        toggle.setAttribute('aria-expanded', String(isOpen));
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