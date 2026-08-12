<x-guest-layout>
    <div class="mb-4 text-sm text-zinc-400">
        ¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar? Si no recibiste el correo, con gusto te enviaremos otro.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-[#ccff00]">
            Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste durante el registro.
        </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-[#ccff00] text-black font-bold text-sm uppercase tracking-widest hover:bg-[#b3e600] transition-colors rounded-lg">
                    Reenviar correo de verificación
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-zinc-400 hover:text-white underline transition-colors">
                Cerrar sesión
            </button>
        </form>
    </div>
</x-guest-layout>
