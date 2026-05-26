<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 tracking-wider uppercase">
            Prompt Lab
        </h1>
        <p class="text-slate-400 text-xs mt-1">Crea tu cuenta de agente para acumular XP</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Nombre completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full bg-[#020617] border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
            @if($errors->has('name'))
                <p class="text-red-400 text-xs mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full bg-[#020617] border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
            @if($errors->has('email'))
                <p class="text-red-400 text-xs mt-1">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Contraseña</label>
            <input type="password" name="password" required autocomplete="new-password"
                class="w-full bg-[#020617] border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
            @if($errors->has('password'))
                <p class="text-red-400 text-xs mt-1">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div>
            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full bg-[#020617] border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
        </div>

        <div class="flex flex-col gap-3 pt-2">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-gray-900 font-bold uppercase tracking-wider text-xs py-3.5 rounded-xl transition-all shadow-lg shadow-cyan-500/20 active:scale-95">
                Registrarse
            </button>

            <a class="text-center text-xs text-gray-400 hover:text-cyan-400 underline transition-colors" href="{{ route('login') }}">
                ¿Ya estás registrado? Inicia Sesión
            </a>
        </div>
    </form>
</x-guest-layout>
