@props(['tallas', 'selected' => '', 'name' => 'talla'])

<div x-data="{
    tallas: @js($tallas),
    selected: '{{ $selected }}',
    mode: null,
    init() {
        if (this.selected) {
            for (const tipo in this.tallas) {
                if (this.tallas[tipo].includes(this.selected)) {
                    this.mode = tipo;
                    break;
                }
            }
        }
        if (!this.mode) {
            this.mode = Object.keys(this.tallas)[0];
        }
    },
    get options() {
        return this.tallas[this.mode] || [];
    },
    selectSize(size) {
        this.selected = size;
    }
}" class="space-y-3">
    <input type="hidden" name="{{ $name }}" :value="selected">

    <div class="flex gap-2">
        <template x-for="tipo in Object.keys(tallas)" :key="tipo">
            <button
                type="button"
                @click="mode = tipo"
                :class="mode === tipo
                    ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00]'
                    : 'bg-[#111210] text-[#f3f2ec]/70 border-[#f3f2ec]/10 hover:border-[#c8ff00]/50 hover:text-[#c8ff00]'"
                class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider border transition-all duration-200 mono"
                x-text="tipo"
            ></button>
        </template>
    </div>

    <div class="flex flex-wrap gap-2">
        <template x-for="size in options" :key="size">
            <button
                type="button"
                @click="selectSize(size)"
                :class="selected === size
                    ? 'bg-[#c8ff00] text-[#111210] border-[#c8ff00] shadow-lg shadow-[#c8ff00]/20'
                    : 'bg-[#111210] text-[#f3f2ec]/80 border-[#f3f2ec]/10 hover:border-[#c8ff00]/50 hover:text-[#c8ff00]'"
                class="min-w-[3rem] px-3 py-2.5 rounded-lg text-sm font-bold border transition-all duration-200 mono"
                x-text="size"
            ></button>
        </template>
    </div>
</div>
