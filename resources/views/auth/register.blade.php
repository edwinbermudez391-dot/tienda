<x-guest-layout>
    <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold mb-2">NUEVA CUENTA</p>
    <h2 class="font-bold uppercase tracking-[-.04em] text-2xl text-[#f3f2ec] mb-6">Registro.</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="Tu nombre">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="correo@ejemplo.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full bg-[#c8ff00] text-[#111210] font-bold py-3.5 px-6 rounded hover:bg-[#c8ff00]/90 transition-colors tracking-wider uppercase text-sm mono">
            Crear cuenta
        </button>

        <p class="text-center text-sm text-[#a5aaa6]">
            ¿Ya tienes cuenta?
            <a class="text-[#c8ff00] hover:underline font-bold" href="{{ route('login') }}">Inicia sesión</a>
        </p>
    </form>
</x-guest-layout>
