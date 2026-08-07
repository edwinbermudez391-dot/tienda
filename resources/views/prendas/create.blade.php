<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN HAUS - Nueva Prenda</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#111210] min-h-screen text-[#f3f2ec]">
    <div class="container mx-auto px-4 py-6 sm:py-10 max-w-2xl">
        <div class="mb-6 sm:mb-10">
            <h1 class="text-2xl sm:text-4xl font-bold text-[#c8ff00] tracking-widest" style="font-family: 'Space Mono', monospace;">URBAN HAUS</h1>
            <div class="mt-3 flex items-center gap-3">
                <span class="h-px w-10 bg-[#c8ff00]/40"></span>
                <p class="text-xs sm:text-sm tracking-wider text-[#f3f2ec]/60 uppercase" style="font-family: 'Space Mono', monospace;">Registrar Nueva Prenda</p>
            </div>
        </div>

        <form action="{{ route('prendas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-[#1b1d1a] p-5 sm:p-8 rounded-lg border border-[#f3f2ec]/10">
            @csrf

            <div>
                <label for="titulo" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                    Titulo <span class="text-[#c8ff00]">*</span>
                </label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    value="{{ old('titulo') }}"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                    placeholder="Ej: Chaqueta Urbana"
                >
                @error('titulo')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="categoria" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                    Categoría <span class="text-[#c8ff00]">*</span>
                </label>
                <select
                    id="categoria"
                    name="categoria"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer"
                >
                    <option value="">Seleccionar categoría</option>
                    <option value="Camisetas" {{ old('categoria') == 'Camisetas' ? 'selected' : '' }}>Camisetas</option>
                    <option value="Hoodies" {{ old('categoria') == 'Hoodies' ? 'selected' : '' }}>Hoodies</option>
                    <option value="Pantalones" {{ old('categoria') == 'Pantalones' ? 'selected' : '' }}>Pantalones</option>
                    <option value="Accesorios" {{ old('categoria') == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                    <option value="Chaquetas" {{ old('categoria') == 'Chaquetas' ? 'selected' : '' }}>Chaquetas</option>
                </select>
                @error('categoria')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descripcion" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                    Descripcion
                </label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="4"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors resize-none"
                    placeholder="Describe la prenda..."
                >{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="precio" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                        Precio <span class="text-[#c8ff00]">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#c8ff00] text-sm" style="font-family: 'Space Mono', monospace;">$</span>
                        <input
                            type="number"
                            id="precio"
                            name="precio"
                            value="{{ old('precio') }}"
                            step="0.01"
                            min="0"
                            class="w-full pl-9 pr-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                            placeholder="0.00"
                        >
                    </div>
                    @error('precio')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="talla" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                        Talla <span class="text-[#c8ff00]">*</span>
                    </label>
                    <select
                        id="talla"
                        name="talla"
                        class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer"
                    >
                        <option value="">Seleccionar talla</option>
                        <option value="S" {{ old('talla') == 'S' ? 'selected' : '' }}>S</option>
                        <option value="M" {{ old('talla') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="L" {{ old('talla') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL" {{ old('talla') == 'XL' ? 'selected' : '' }}>XL</option>
                    </select>
                    @error('talla')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="estado" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                    Estado <span class="text-[#c8ff00]">*</span>
                </label>
                <select
                    id="estado"
                    name="estado"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer"
                >
                    <option value="disponible" {{ old('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="reservado" {{ old('estado') == 'reservado' ? 'selected' : '' }}>Reservado</option>
                    <option value="vendido" {{ old('estado') == 'vendido' ? 'selected' : '' }}>Vendido</option>
                </select>
                @error('estado')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-4" style="font-family: 'Space Mono', monospace;">
                    Visibilidad en Secciones
                </label>
                <div class="space-y-3">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_spotlight" value="1" {{ old('mostrar_spotlight') ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Spotlight (Piezas destacadas)</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_catalogo" value="1" {{ old('mostrar_catalogo', true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Catálogo / Exposición</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_muro" value="1" {{ old('mostrar_muro') ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Muro de Estilo</span>
                    </label>
                </div>
            </div>

            <div>
                <label for="imagen" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2" style="font-family: 'Space Mono', monospace;">
                    Imagen <span class="text-[#c8ff00]">*</span>
                </label>
                <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    accept="image/*"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec]/70 file:mr-4 file:py-1.5 file:px-4 file:rounded file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-[#c8ff00] file:text-[#111210] hover:file:bg-[#c8ff00]/90 file:cursor-pointer cursor-pointer"
                >
                @error('imagen')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-4 sm:flex-row pt-4">
                <button
                    type="submit"
                    class="flex-1 bg-[#c8ff00] text-[#111210] font-bold py-3.5 px-6 rounded hover:bg-[#c8ff00]/90 transition-colors tracking-wider uppercase text-sm"
                    style="font-family: 'Space Mono', monospace;"
                >
                    Guardar Prenda
                </button>
                <a
                    href="{{ route('prendas.admin') }}"
                    class="flex-1 sm:flex-none px-6 py-3.5 border border-[#f3f2ec]/20 text-[#f3f2ec]/70 rounded hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors text-sm uppercase tracking-wider text-center"
                    style="font-family: 'Space Mono', monospace;"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
