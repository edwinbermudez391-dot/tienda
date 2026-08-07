@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginación" class="flex items-center justify-center">
        <ul class="flex items-center gap-2 mono text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 rounded-lg border border-white/10 bg-[#1b1d1a] text-[#a5aaa6]/50 cursor-not-allowed">
                        ← Anterior
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 rounded-lg border border-white/10 bg-[#1b1d1a] text-[#f3f2ec] hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors">
                        ← Anterior
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 text-[#a5aaa6]">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 rounded-lg border border-[#c8ff00] bg-[#c8ff00] text-[#111210] font-bold">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 rounded-lg border border-white/10 bg-[#1b1d1a] text-[#f3f2ec] hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 rounded-lg border border-white/10 bg-[#1b1d1a] text-[#f3f2ec] hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors">
                        Siguiente →
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 rounded-lg border border-white/10 bg-[#1b1d1a] text-[#a5aaa6]/50 cursor-not-allowed">
                        Siguiente →
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
