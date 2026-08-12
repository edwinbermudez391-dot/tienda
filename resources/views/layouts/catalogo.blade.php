<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'URBAN HAUS — Exposición 04')</title>
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
    .zoom-image { transition:transform .6s ease; }
    .zoom-container:hover .zoom-image { transform:scale(1.05); }
    @media (max-width:767px) { .desktop-nav { display:none; } }
    @media (min-width:768px) { .mobile-toggle,.mobile-drawer,.drawer-overlay { display:none; } }
    
    .drawer-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.8);
      backdrop-filter: blur(8px);
      z-index: 49;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
      max-width: 360px;
      background: linear-gradient(135deg, #1b1d1a 0%, #111210 100%);
      border-left: 1px solid rgba(200, 255, 0, 0.15);
      z-index: 50;
      transform: translateX(100%);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      overflow-y: auto;
      box-shadow: -20px 0 60px rgba(0, 0, 0, 0.5);
    }
    .mobile-drawer.active {
      transform: translateX(0);
    }
    .drawer-link {
      display: block;
      padding: 1.25rem 1.75rem;
      font-size: 0.95rem;
      font-weight: 600;
      color: #f3f2ec;
      text-decoration: none;
      border-bottom: 1px solid rgba(243, 242, 236, 0.08);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }
    .drawer-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 3px;
      background: #c8ff00;
      transform: scaleY(0);
      transition: transform 0.3s ease;
    }
    .drawer-link:hover {
      background: rgba(200, 255, 0, 0.06);
      color: #c8ff00;
      padding-left: 2.25rem;
    }
    .drawer-link:hover::before {
      transform: scaleY(1);
    }
    .drawer-close-btn {
      transition: all 0.3s ease;
    }
    .drawer-close-btn:hover {
      background: rgba(200, 255, 0, 0.15);
      border-color: #c8ff00;
      transform: rotate(90deg);
    }
    @yield('styles')
  </style>
</head>
<body class="w-full overflow-x-hidden" style="background: rgb(17, 18, 16);">
  <header class="sticky top-0 z-40 border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl overflow-hidden">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-5 py-3 sm:py-4 md:px-8" aria-label="Navegación principal">
      <a href="{{ route('prendas.index') }}" class="flex items-center gap-2 sm:gap-3">
        <span class="h-2.5 w-2.5 sm:h-3 sm:w-3 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-lg sm:text-xl text-[#f3f2ec]">URBAN HAUS.</span>
      </a>
      <div class="desktop-nav hidden md:flex items-center gap-7">
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="/#spotlight">Spotlight</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="/#exposicion">Exposición</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="/#muro">Muro de estilo</a>
        <a class="text-sm text-white/70 transition hover:text-[#c8ff00]" href="/#contacto">Contacto</a>
        @auth
        <a class="text-sm text-[#c8ff00] border border-[#c8ff00] px-4 py-1 rounded-full transition hover:bg-[#c8ff00] hover:text-[#111210]" href="{{ route('prendas.admin') }}">Panel Admin</a>
        @endauth
        <a class="lime-action rounded-full px-5 py-2.5 text-sm font-bold" href="/#exposicion">Ver piezas</a>
      </div>
      <button id="menu-toggle" class="mobile-toggle md:hidden flex items-center justify-center w-10 h-10 rounded-full border border-white/20 bg-white/5 backdrop-blur-sm transition-all hover:border-[#c8ff00] hover:bg-[#c8ff00]/10" type="button" aria-label="Abrir menú">
        <svg class="w-5 h-5 text-[#f3f2ec]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </nav>
  </header>

  <div id="drawer-overlay" class="drawer-overlay"></div>

  <div id="mobile-drawer" class="mobile-drawer">
    <div class="sticky top-0 z-10 flex items-center justify-between border-b border-white/10 bg-[#1b1d1a]/95 backdrop-blur-md px-6 py-5">
      <div class="flex items-center gap-3">
        <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
        <span class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</span>
      </div>
      <button id="drawer-close" class="drawer-close-btn flex items-center justify-center w-10 h-10 rounded-full border border-white/20 bg-white/5" aria-label="Cerrar menú">
        <svg class="w-5 h-5 text-[#f3f2ec]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
    <nav class="flex flex-col py-6">
      <a class="drawer-link" href="/#spotlight">
        <span class="mono text-[10px] tracking-[.2em] text-[#c8ff00] font-bold block mb-1.5">01</span>
        <span class="text-lg font-semibold">Spotlight</span>
      </a>
      <a class="drawer-link" href="/#exposicion">
        <span class="mono text-[10px] tracking-[.2em] text-[#c8ff00] font-bold block mb-1.5">02</span>
        <span class="text-lg font-semibold">Exposición</span>
      </a>
      <a class="drawer-link" href="/#muro">
        <span class="mono text-[10px] tracking-[.2em] text-[#c8ff00] font-bold block mb-1.5">03</span>
        <span class="text-lg font-semibold">Muro de Estilo</span>
      </a>
      <a class="drawer-link" href="/#contacto">
        <span class="mono text-[10px] tracking-[.2em] text-[#c8ff00] font-bold block mb-1.5">04</span>
        <span class="text-lg font-semibold">Contacto</span>
      </a>
      @auth
      <a class="drawer-link" href="{{ route('prendas.admin') }}">
        <span class="mono text-[10px] tracking-[.2em] text-[#c8ff00] font-bold block mb-1.5">ADMIN</span>
        <span class="text-lg font-semibold">Panel de Control</span>
      </a>
      @endauth
    </nav>
    <div class="sticky bottom-0 px-6 py-6 border-t border-white/10 bg-[#1b1d1a]/95 backdrop-blur-md">
      <a class="lime-action block rounded-full px-6 py-4 text-sm font-bold text-center shadow-lg shadow-[#c8ff00]/20" href="/#exposicion">
        Ver piezas
      </a>
      <p class="mono text-[10px] tracking-[.15em] text-[#a5aaa6] text-center mt-4">BOGOTÁ · 2026</p>
    </div>
  </div>

  <main class="w-full overflow-x-hidden">
    @yield('content')
  </main>

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
      
      const toggle = document.getElementById('menu-toggle');
      const drawer = document.getElementById('mobile-drawer');
      const overlay = document.getElementById('drawer-overlay');
      const closeBtn = document.getElementById('drawer-close');
      const drawerLinks = drawer.querySelectorAll('.drawer-link');
      
      function openDrawer() {
        drawer.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        drawerLinks.forEach((link, index) => {
          link.style.opacity = '0';
          link.style.transform = 'translateX(20px)';
          setTimeout(() => {
            link.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            link.style.opacity = '1';
            link.style.transform = 'translateX(0)';
          }, 100 + (index * 60));
        });
      }
      
      function closeDrawer() {
        drawer.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
        
        drawerLinks.forEach(link => {
          link.style.transition = '';
          link.style.opacity = '';
          link.style.transform = '';
        });
      }
      
      toggle.addEventListener('click', openDrawer);
      closeBtn.addEventListener('click', closeDrawer);
      overlay.addEventListener('click', closeDrawer);
      
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawer.classList.contains('active')) {
          closeDrawer();
        }
      });
      
      drawerLinks.forEach(link => {
        link.addEventListener('click', () => {
          closeDrawer();
        });
      });

      @yield('scripts')
    });
  </script>
</body>
</html>
