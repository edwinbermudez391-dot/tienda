@extends('layouts.catalogo')

@section('title', 'URBAN HAUS — ' . $prenda->titulo)

@section('styles')
.zoom-image { transition:transform .6s ease; }
.zoom-container:hover .zoom-image { transform:scale(1.05); }
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-10 md:px-8 md:py-16">
      <a href="{{ route('prendas.index') }}#exposicion" onclick="event.preventDefault(); window.history.back();" class="inline-flex items-center gap-2 text-zinc-400 hover:text-[#ccff00] transition-colors duration-300 mb-6 text-sm md:text-base font-semibold group">
        <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Volver al catálogo</span>
      </a>
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
    </div>
@endsection
