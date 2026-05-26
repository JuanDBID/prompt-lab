<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 tracking-wider uppercase">
            Autenticación
        </h2>
        <p class="text-slate-400 text-xs mt-1.5">Inicia sesion  para acceder a la terminal</p>
    </div>

    @if (session('status'))
        <div class="mb-4 text-center font-semibold text-xs text-cyan-400 bg-cyan-950/40 border border-cyan-800/50 py-2 rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Correo Electrónico</label>
            <div class="relative">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full bg-[#020617]/90 border border-slate-800/80 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition-all" placeholder="agente@promptlab.com">
            </div>
            @if($errors->has('email'))
                <p class="text-red-400 text-xs mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i> {{ $errors->first('email') }}</p>
            @endif
        </div>

        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full bg-[#020617]/90 border border-slate-800/80 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition-all" placeholder="••••••••••••">
            @if($errors->has('password'))
                <p class="text-red-400 text-xs mt-1.5 font-medium"><i class="fas fa-exclamation-circle mr-1"></i> {{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" class="rounded bg-[#020617] border-slate-800 text-cyan-500 focus:ring-cyan-500 focus:ring-offset-0 w-4 h-4" name="remember">
                <span class="ms-2 text-xs text-slate-400 hover:text-slate-300 transition-colors">Mantener sesión activa</span>
            </label>
        </div>

        <div class="space-y-4 pt-2">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-gray-950 font-black uppercase tracking-wider text-xs py-3.5 rounded-xl transition-all shadow-lg shadow-cyan-500/10 active:scale-[0.98]">
                <i class="fas fa-terminal mr-1.5"></i> Iniciar Conexión
            </button>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-center pt-1 border-t border-slate-800/60 mt-2">
                @if (Route::has('password.request'))
                    <a class="text-xs text-slate-500 hover:text-cyan-400 underline transition-colors" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <a class="text-xs text-slate-400 hover:text-cyan-400 font-semibold transition-colors" href="{{ route('register') }}">
                    Crear cuenta<i class="fas fa-arrow-right ml-1 text-[10px]"></i>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
