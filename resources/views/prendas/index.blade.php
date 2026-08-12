@extends('layouts.catalogo')

@section('title', 'URBAN HAUS — Exposición 04')

@section('content')
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

    <section class="relative overflow-hidden border-y border-white/10 bg-[#c8ff00] py-3 text-[#111210]">
      <div class="ticker flex w-max gap-9 whitespace-nowrap mono text-xs font-bold tracking-[.14em]">
        <span>PIEZAS PARA EL MOVIMIENTO</span><span>✦</span>
        <span>FORMA / FUNCIÓN / FRICCIÓN</span><span>✦</span>
        <span>URBAN HAUS / EXHIBITION 04</span><span>✦</span>
        <span>HECHO PARA RECORRER</span><span>✦</span>
      </div>
    </section>

    <section id="spotlight" class="border-t border-white/10 bg-[#111210] px-5 sm:px-6 py-16 sm:py-20 md:px-8 md:py-28">
      <div class="mx-auto max-w-7xl">
        <div class="flex flex-col justify-between gap-6 sm:gap-7 md:flex-row md:items-end">
          <div>
            <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">01 / SPOTLIGHT</p>
            <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec] md:text-4xl">Piezas destacadas.</h2>
          </div>
          <p class="max-w-md leading-relaxed text-[#a5aaa6]">Selección curatorial de las piezas más icónicas de la colección. Ediciones limitadas y exclusivos del archivo.</p>
        </div>

        <div class="mt-12 grid grid-cols-2 gap-3 sm:gap-6 lg:grid-cols-3 lg:gap-8">
          @forelse($spotlightPrendas as $prenda)
          <div onclick="window.location.href='{{ route('prendas.show', $prenda->id) }}'" class="group relative block overflow-hidden rounded-xl sm:rounded-2xl border border-white/10 bg-[#1b1d1a] cursor-pointer transition-all duration-300 hover:border-[#c8ff00]/50 hover:shadow-[0_20px_60px_rgba(200,255,0,0.15)]">
            <a href="{{ route('prendas.show', $prenda->id) }}" class="absolute inset-0 z-40">
              <span class="sr-only">Ver detalles de {{ $prenda->titulo }}</span>
            </a>
            <div class="relative h-36 sm:h-64 lg:h-72 w-full overflow-hidden">
              <img loading="lazy" class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-105" src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
              <div class="absolute inset-0 bg-gradient-to-t from-[#111210] via-transparent to-transparent opacity-60"></div>
              <span class="absolute left-2 top-2 sm:left-4 sm:top-4 z-50 rounded-full bg-[#c8ff00] px-2 py-0.5 sm:px-3 sm:py-1 mono text-[8px] sm:text-[10px] font-bold text-[#111210]">{{ strtoupper($prenda->estado) }}</span>
              <div class="absolute bottom-0 left-0 right-0 p-2.5 sm:p-5">
                <p class="mono text-[8px] sm:text-[10px] tracking-[.14em] text-[#c8ff00]/80">UH-04 / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
                <h3 class="mt-0.5 font-bold text-xs sm:text-lg text-[#f3f2ec] leading-snug">{{ $prenda->titulo }}</h3>
              </div>
            </div>
            <div class="relative flex items-center justify-between border-t border-white/10 px-2.5 py-2 sm:px-5 sm:py-4">
              <span class="mono font-bold text-[#c8ff00] text-xs sm:text-base">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
              <span class="mono text-[9px] sm:text-xs text-[#a5aaa6]">{{ $prenda->categoria }}</span>
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

    <section id="coleccion" class="border-t border-white/10 mx-auto max-w-7xl px-5 sm:px-6 py-16 sm:py-20 md:px-8 md:py-28">
      <div class="flex flex-col justify-between gap-6 sm:gap-7 md:flex-row md:items-end">
        <div>
          <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">02 / CATÁLOGO CURATORIAL</p>
          <h2 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec]">Piezas en tránsito.</h2>
        </div>
        <p class="max-w-md leading-relaxed text-[#a5aaa6]">Cada prenda aparece aquí como un fragmento de ciudad: diseñada para combinar y tensionar a tu manera.</p>
      </div>

      <div id="catalogo-contenedor">
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ route('prendas.index') }}#coleccion" class="filter-chip rounded-full border px-4 py-2 mono text-xs font-bold transition {{ !request('categoria') ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00]' : 'border-white/20 text-[#a5aaa6] hover:border-[#c8ff00] hover:text-[#c8ff00]' }}">
            Ver Todo
          </a>
          @foreach($categorias as $cat)
            <a href="{{ route('prendas.index', ['categoria' => $cat]) }}#coleccion" class="filter-chip rounded-full border px-4 py-2 mono text-xs font-bold transition {{ request('categoria') == $cat ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00]' : 'border-white/20 text-[#a5aaa6] hover:border-[#c8ff00] hover:text-[#c8ff00]' }}">
              {{ $cat }}
            </a>
          @endforeach
        </div>

        <div id="piece-grid" class="mt-12 grid grid-cols-2 gap-3 sm:gap-6 lg:grid-cols-3 lg:gap-8">
          @forelse($prendas as $prenda)
          <div onclick="window.location.href='{{ route('prendas.show', $prenda->id) }}'" class="piece-card relative block overflow-hidden rounded-xl sm:rounded-2xl border border-white/10 bg-[#1b1d1a] cursor-pointer">
            <a href="{{ route('prendas.show', $prenda->id) }}" class="absolute inset-0 z-40">
              <span class="sr-only">Ver detalles de {{ $prenda->titulo }}</span>
            </a>
            <div class="relative h-36 sm:h-64 lg:h-72 w-full overflow-hidden">
              <img loading="lazy" class="piece-image h-full w-full object-cover" src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80';">
              <span class="absolute left-2 top-2 sm:left-4 sm:top-4 z-50 rounded-full bg-[#c8ff00] px-2 py-0.5 sm:px-3 sm:py-1 mono text-[8px] sm:text-[10px] font-bold text-[#111210]">{{ strtoupper($prenda->estado) }}</span>
            </div>
            <div class="relative flex flex-col space-y-0.5 sm:space-y-2 p-2.5 sm:p-5">
              <p class="mono text-[8px] sm:text-[10px] tracking-[.14em] text-[#a5aaa6]">UH-04 / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
              <h3 class="font-bold text-xs sm:text-lg text-[#f3f2ec] leading-snug">{{ $prenda->titulo }}</h3>
              <div class="flex items-center gap-1.5 sm:gap-3 pt-0.5">
                <span class="mono font-bold text-[#c8ff00] text-xs sm:text-lg">$ {{ number_format($prenda->precio, 0, ',', '.') }}</span>
                <span class="text-[9px] sm:text-sm text-gray-400">{{ $prenda->talla }}</span>
              </div>
              <div class="flex items-center gap-2 pt-0.5">
                <span class="text-[9px] sm:text-sm text-gray-400">{{ $prenda->categoria }}</span>
              </div>
              @if($prenda->descripcion)
              <p class="text-[9px] sm:text-sm leading-relaxed text-[#a5aaa6] line-clamp-2 pt-0.5">{{ $prenda->descripcion }}</p>
              @endif
            </div>
          </div>
          @empty
          <div class="col-span-full py-16 text-center text-[#a5aaa6]">
            <p class="mono text-sm">No hay prendas registradas en el archivo actual.</p>
          </div>
          @endforelse
        </div>

        <div class="mt-12">
          {{ $prendas->links('vendor.pagination.urban-haus') }}
        </div>
      </div>
    </section>

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

    @endsection

@section('scripts')
const catalogoContainer = document.getElementById('catalogo-contenedor');

catalogoContainer.addEventListener('click', (e) => {
  const link = e.target.closest('a');
  if (!link || !link.getAttribute('href')) return;

  const href = link.getAttribute('href');
  const hasColeccionHash = href.includes('#coleccion');
  const isFilterChip = link.classList.contains('filter-chip');
  const isPaginationLink = !!link.closest('nav[aria-label="Pagination"]') || link.href.includes('page=');

  if (!hasColeccionHash || (!isFilterChip && !isPaginationLink)) return;

  e.preventDefault();
  const url = href.replace(/#coleccion$/, '');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch(url, {
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': csrfToken
    }
  })
  .then(response => response.text())
  .then(html => {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const newContent = doc.querySelector('#catalogo-contenedor');

    if (newContent) {
      const htmlElement = document.documentElement;
      const originalBehavior = htmlElement.style.scrollBehavior;
      htmlElement.style.scrollBehavior = 'auto';

      const coleccionSection = document.getElementById('coleccion');
      if (coleccionSection) {
        const topPos = coleccionSection.getBoundingClientRect().top + window.pageYOffset - 80;
        window.scrollTo({ top: topPos, behavior: 'instant' });
      }

      catalogoContainer.innerHTML = newContent.innerHTML;
      history.pushState(null, '', href);
      if (typeof lucide !== 'undefined') lucide.createIcons();

      requestAnimationFrame(() => {
        htmlElement.style.scrollBehavior = originalBehavior;
      });
    }
  })
  .catch(error => console.error('Error:', error));
});

window.addEventListener('popstate', () => {
  const url = window.location.href;
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch(url, {
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': csrfToken
    }
  })
  .then(response => response.text())
  .then(html => {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const newContent = doc.querySelector('#catalogo-contenedor');

    if (newContent) {
      const htmlElement = document.documentElement;
      const originalBehavior = htmlElement.style.scrollBehavior;
      htmlElement.style.scrollBehavior = 'auto';

      const coleccionSection = document.getElementById('coleccion');
      if (coleccionSection) {
        const topPos = coleccionSection.getBoundingClientRect().top + window.pageYOffset - 80;
        window.scrollTo({ top: topPos, behavior: 'instant' });
      }

      document.getElementById('catalogo-contenedor').innerHTML = newContent.innerHTML;
      if (typeof lucide !== 'undefined') lucide.createIcons();

      requestAnimationFrame(() => {
        htmlElement.style.scrollBehavior = originalBehavior;
      });
    }
  })
  .catch(error => console.error('Error:', error));
});
@endsection
