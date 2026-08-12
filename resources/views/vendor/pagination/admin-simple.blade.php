@if ($paginator->hasPages())
    <nav class="flex justify-center gap-4 mt-8 mb-6 w-full" aria-label="Paginación Admin">
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" class="px-5 py-2.5 bg-zinc-900 border border-zinc-800 text-zinc-300 hover:text-[#ccff00] hover:border-[#ccff00] rounded-lg text-sm sm:text-base transition-all duration-300 font-semibold shadow-sm">
                &larr; Anterior
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-5 py-2.5 bg-zinc-900 border border-zinc-800 text-zinc-300 hover:text-[#ccff00] hover:border-[#ccff00] rounded-lg text-sm sm:text-base transition-all duration-300 font-semibold shadow-sm">
                Siguiente &rarr;
            </a>
        @endif
    </nav>
@endif
