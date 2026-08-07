<x-guest-layout>
    <p class="mono text-xs tracking-[.18em] text-[#c8ff00] font-bold mb-2">ACCESO RESTRINGIDO</p>
    <h2 class="font-bold uppercase tracking-[-.04em] text-2xl text-[#f3f2ec] mb-6">Iniciar sesión.</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="correo@ejemplo.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#f3f2ec]/70 mb-2 mono">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-4 py-3 bg-[#111210] border border-[#f3f2ec]/10 rounded text-[#f3f2ec] placeholder-[#f3f2ec]/30 focus:outline-none focus:border-[#c8ff00] transition-colors"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-[#f3f2ec]/20 bg-[#111210] text-[#c8ff00] shadow-sm focus:ring-[#c8ff00]/50">
                <span class="ms-2 text-sm text-[#a5aaa6]">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-[#c8ff00] hover:underline" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full bg-[#c8ff00] text-[#111210] font-bold py-3.5 px-6 rounded hover:bg-[#c8ff00]/90 transition-colors tracking-wider uppercase text-sm mono">
            Ingresar
        </button>
    </form>
</x-guest-layout>
