@extends('layouts.admin')

@section('title', 'URBAN HAUS — Editar Prenda')

@section('content')
        <div class="mb-6 sm:mb-10">
            <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold">EDITAR / {{ str_pad($prenda->id, 3, '0', STR_PAD_LEFT) }}</p>
            <h1 class="mt-3 font-bold uppercase leading-none tracking-[-.06em] text-2xl sm:text-3xl text-[#f3f2ec] md:text-4xl">Modificar pieza.</h1>
        </div>

        <form action="{{ route('prendas.update', $prenda) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-[#1b1d1a] p-5 sm:p-8 rounded-2xl border border-[#f3f2ec]/10">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Título <span class="text-[#c8ff00]">*</span>
                </label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $prenda->titulo) }}" maxlength="255"
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
                    @foreach($categorias as $cat)
                        <option value="{{ $cat }}" {{ old('categoria', $prenda->categoria) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
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
                <textarea id="descripcion" name="descripcion" rows="4" maxlength="1000"
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
                        @foreach($tallas as $nombre_grupo => $grupo)
                            <optgroup label="{{ $nombre_grupo }}">
                                @foreach($grupo as $t)
                                    <option value="{{ $t }}" {{ old('talla', $prenda->talla) == $t ? 'selected' : '' }}>{{ $t }}</option>
                                @endforeach
                            </optgroup>
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
                <label class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-4 mono">
                    Visibilidad en Secciones
                </label>
                <div class="space-y-3">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_spotlight" value="1" {{ old('mostrar_spotlight', $prenda->mostrar_spotlight) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Spotlight (Piezas destacadas)</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_catalogo" value="1" {{ old('mostrar_catalogo', $prenda->mostrar_catalogo) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Catálogo / Exposición</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="mostrar_muro" value="1" {{ old('mostrar_muro', $prenda->mostrar_muro) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-2 border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] focus:ring-[#c8ff00]/50 focus:ring-offset-0 cursor-pointer transition-colors checked:bg-[#c8ff00] checked:border-[#c8ff00]">
                        <span class="text-sm text-[#f3f2ec]/80 group-hover:text-[#c8ff00] transition-colors">Muro de Estilo</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">
                    Imagen actual
                </label>
                <div class="mb-3 h-40 w-full overflow-hidden rounded-lg border border-white/10 bg-[#111210]">
                    @if($prenda->imagen)
                        <img src="{{ Storage::disk('s3')->url($prenda->imagen) }}" alt="{{ $prenda->titulo }}" class="h-full w-full object-cover">
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

            <div class="flex flex-col gap-4 sm:flex-row pt-4">
                <button type="submit"
                    class="flex-1 bg-[#c8ff00] text-[#111210] font-bold py-3.5 px-6 rounded hover:bg-[#c8ff00]/90 transition-colors tracking-wider uppercase text-sm mono">
                    Actualizar Prenda
                </button>
                <a href="{{ route('prendas.admin') }}"
                    class="flex-1 sm:flex-none px-6 py-3.5 border border-[#f3f2ec]/20 text-[#f3f2ec]/70 rounded hover:border-[#c8ff00] hover:text-[#c8ff00] transition-colors text-sm uppercase tracking-wider mono text-center">
                    Cancelar
                </a>
            </div>
        </form>
@endsection
