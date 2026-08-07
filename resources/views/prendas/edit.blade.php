<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URBAN HAUS — Editar Prenda</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#111210; --panel:#1b1d1a; --paper:#f3f2ec; --silver:#a5aaa6; --lime:#c8ff00; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:"DM Sans",sans-serif; color:var(--paper); background:var(--ink); }
        .mono { font-family:"Space Mono",monospace; }
        .line-action { border:1px solid rgba(243,242,236,.3); transition:border-color .2s ease, background .2s ease; }
        .line-action:hover { border-color:var(--lime); background:rgba(200,255,0,.08); }
    </style>
</head>
<body class="min-h-screen">
    <header class="border-b border-white/10 bg-[#111210]/90 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-8">
            <a href="{{ route('prendas.admin') }}" class="flex items-center gap-3">
                <span class="h-3 w-3 rotate-45 bg-[#c8ff00]"></span>
                <span class="mono font-bold tracking-[-.1em] text-xl text-[#f3f2ec]">URBAN HAUS.</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('prendas.admin') }}" class="line-action rounded-full px-5 py-2.5 text-sm font-bold text-[#f3f2ec]">← Panel</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-full border border-red-500/30 bg-red-500/10 px-5 py-2.5 text-sm font-bold text-red-400 transition hover:border-red-500 hover:bg-red-500/20">Cerrar sesión</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-2xl px-4 py-10">
        <div class="mb-10">
            <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">EDITAR / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
            <h1 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-3xl text-[#f3f2ec] md:text-4xl">Modificar pieza.</h1>
        </div>

        <form action="{{ route('prendas.update', $prenda) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-[#1b1d1a] p-8 rounded-2xl border border-[#f3f2ec]/10">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Título <span class="text-[#c8ff00]">*</span>
                </label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $prenda->titulo) }}"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                    placeholder="Ej: Chaqueta Urbana">
                @error('titulo')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="categoria" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Categoría <span class="text-[#c8ff00]">*</span>
                </label>
                <select id="categoria" name="categoria"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer">
                    <option value="">Seleccionar categoría</option>
                    @foreach(['Camisetas','Hoodies','Pantalones','Accesorios','Chaquetas'] as $c)
                        <option value="{{ $c }}" {{ old('categoria', $prenda->categoria) == $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descripcion" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Descripción
                </label>
                <textarea id="descripcion" name="descripcion" rows="4"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors resize-none"
                    placeholder="Describe la prenda...">{{ old('descripcion', $prenda->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="precio" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                        Precio <span class="text-[#c8ff00]">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#c8ff00] text-sm mono">$</span>
                        <input type="number" id="precio" name="precio" value="{{ old('precio', $prenda->precio) }}" step="0.01" min="0"
                            class="w-full pl-9 pr-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                            placeholder="0.00">
                    </div>
                    @error('precio')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="talla" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                        Talla <span class="text-[#c8ff00]">*</span>
                    </label>
                    <select id="talla" name="talla"
                        class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer">
                        <option value="">Seleccionar talla</option>
                        @foreach(['S','M','L','XL'] as $t)
                            <option value="{{ $t }}" {{ old('talla', $prenda->talla) == $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                    @error('talla')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="estado" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Estado <span class="text-[#c8ff00]">*</span>
                </label>
                <select id="estado" name="estado"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] focus:outline-none focus:border-[#c8ff00] transition-colors appearance-none cursor-pointer">
                    @foreach(['disponible','reservado','vendido'] as $e)
                        <option value="{{ $e }}" {{ old('estado', $prenda->estado) == $e ? 'selected' : '' }}>{{ ucfirst($e) }}</option>
                    @endforeach
                </select>
                @error('estado')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Imagen actual
                </label>
                <div class="mb-3 h-40 w-full overflow-hidden rounded-lg border border-white/10 bg-[#111210]">
                    @if($prenda->imagen)
                        <img src="{{ asset('storage/' . $prenda->imagen) }}" alt="{{ $prenda->titulo }}" class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full w-full items-center justify-center text-[#a5aaa6] text-sm mono">Sin imagen</div>
                    @endif
                </div>
                <label for="imagen" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Reemplazar imagen <span class="text-[#a5aaa6] font-normal normal-case">(opcional)</span>
                </label>
                <input type="file" id="imagen" name="imagen" accept="image/*"
                    class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec]/70 file:mr-4 file:py-1.5 file:px-4 file:rounded file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-[#c8ff00] file:text-[#111210] hover:file:bg-[#c8ff00]/90 file:cursor-pointer cursor-pointer">
                @error('imagen')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit"
                    class="flex-1 bg-[#c8ff00] text-[#111210] font-bold py-3.5 px-6 rounded hover:bg-[#c8ff00]/90 transition-colors tracking-wider uppercase text-sm mono">
                    Actualizar Prenda
                </button>
                <a href="{{ route('prendas.admin') }}"
                    class="px-6 py-3.5 border border-[#f3f2ec]/20 text-[#f3f2ec]/70 rounded hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors text-sm uppercase tracking-wider mono">
                    Cancelar
                </a>
            </div>
        </form>
    </main>
</body>
</html>
