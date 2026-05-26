<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Lab | Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #3b82f6; }
        
        .bg-main-pattern {
            background-color: #020617;
            background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
            background-size: 250px;
            background-attachment: fixed;
        }

        .logo-shadow {
            filter: drop-shadow(0 0 15px rgba(56, 189, 248, 0.25));
        }

        .status-pulse {
            animation: pulse-blue 2s infinite;
        }

        @keyframes pulse-blue {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        .cyber-title-blue {
            color: #ffffff;
            transition: color 0.2s ease-in-out, text-shadow 0.2s ease-in-out;
            cursor: default;
        }
        
        .cyber-header-wrapper:hover .cyber-title-blue {
            color: #60a5fa;
            text-shadow: 0 0 15px rgba(59, 130, 246, 0.6);
        }

        .real-retro-mario {
            width: 48px;
            height: 52px;
            display: inline-block;
            background-repeat: no-repeat;
            background-size: contain;
            image-rendering: pixelated;
            transform: scaleX(-1);
            filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.5));
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h5v1H3zm5 0h3v1H8zm-6 1h8v1H2zm0 1h9v1H2zm0 1h7v1H2zm-1 1h8v1H1zm0 1h3v1H1zm5 0h3v1H6zm-5 1h2v1H1zm6 0h2v1H7z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 1h2v1H2zm5 0h2v1H7zm-6 1h3v1H1zm6 0h3v1H7z' fill='%23704000'/></svg>");
            animation: marioRetroRun 0.25s steps(1) infinite;
        }

        @keyframes marioRetroRun {
            0%, 100% {
                background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h5v1H3zm5 0h3v1H8zm-6 1h8v1H2zm0 1h9v1H2zm0 1h7v1H2zm-1 1h8v1H1zm0 1h3v1H1zm5 0h3v1H6zm-5 1h2v1H1zm6 0h2v1H7z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 1h2v1H2zm5 0h2v1H7zm-6 1h3v1H1zm6 0h3v1H7z' fill='%23704000'/></svg>");
                transform: scaleX(-1) translateY(0px);
            }
            50% {
                background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h4v1H3zm5 0h3v1H8zm-6 1h7v1H2zm0 1h9v1H2zm1 1h8v1H3zm0 1h8v1H3zm-1 1h3v1H2zm5 0h3v1H7zm-2 1h2v1H5zm-3 0h2v1H2zm6 0h2v1H8z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 1h2v1H2zm7 0h2v1H9zm-2 1h2v1H5zm-4 0h2v1H2zm6 0h2v1H8z' fill='%23704000'/></svg>");
                transform: scaleX(-1) translateY(-2px);
            }
        }

        .cyber-card-blue { position: relative; overflow: hidden; }
        .cyber-card-blue::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.05), transparent);
            transform: rotate(45deg); transition: 0.6s; opacity: 0; pointer-events: none;
        }
        .cyber-card-blue:hover::before { animation: cardShineBlue 1.2s ease-in-out; }

        @keyframes cardShineBlue {
            0% { transform: translate(-30%, -30%) rotate(45deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translate(30%, 30%) rotate(45deg); opacity: 0; }
        }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 font-sans overflow-hidden antialiased">

    <div class="flex h-screen">
        <aside class="w-72 bg-[#0f172a] border-r border-slate-800 flex flex-col shadow-2xl z-20 relative">
            <div class="px-6 pt-10 pb-4 border-b border-slate-800/50">
                <a href="/" class="group block text-center">
                    <img src="{{ asset('images/logo-prompt-lab.png') }}" alt="Logo Prompt Lab" class="w-full h-auto object-contain logo-shadow transition-transform duration-500 group-hover:scale-105">
                </a>
            </div>

            <h3 class="text-slate-500 uppercase text-[10px] font-black mt-6 mb-4 px-8 tracking-widest">Módulos</h3>

            <nav class="space-y-2 flex-grow overflow-y-auto px-4">
                <a href="/" class="group flex items-center p-3 rounded-2xl transition-all duration-300 {{ !request('categoria') ? 'bg-blue-600/20 border border-blue-500/50 text-blue-400 shadow-[0_0_20px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                    <i class="fas fa-layer-group mr-3 text-sm"></i>
                    <span class="font-bold text-sm">Explorar Todo</span>
                </a>

                @foreach($categorias as $cat)
                    <a href="/?categoria={{ $cat }}" class="group flex items-center p-3 rounded-2xl transition-all duration-300 {{ request('categoria') == $cat ? 'bg-blue-600 text-white shadow-xl shadow-blue-900/40 status-pulse' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                        <i class="{{ $cat == 'IA Básica' ? 'fas fa-lightbulb' : ($cat == 'Algoritmos' ? 'fas fa-square-root-alt' : 'fas fa-brain') }} mr-3 text-sm"></i>
                        <span class="font-bold text-sm">{{ $cat }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="p-6 border-t border-slate-800 space-y-4">
                @auth
                    <div class="bg-slate-900/50 border border-slate-800 p-3 rounded-xl flex flex-col gap-1">
                        <span class="text-[10px] font-black text-blue-400 uppercase tracking-wider">Agente Conectado</span>
                        <span class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</span>
                    </div>

                    <div class="bg-emerald-950/30 border border-emerald-500/20 p-3.5 rounded-2xl flex items-center justify-between">
                        <span class="text-[10px] font-black text-emerald-400 uppercase tracking-wider">Energía</span>
                        <span class="text-sm font-black text-white italic"><i class="fas fa-bolt text-emerald-400 mr-1"></i>{{ $totalXp ?? 0 }} XP</span>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-center text-red-400 hover:text-red-300 text-[10px] font-black uppercase tracking-wider bg-red-950/20 p-2.5 rounded-xl border border-red-900/30 transition-all">
                            Desconectar
                        </button>
                    </form>
                @else
                    <div class="bg-slate-900/80 border border-slate-800 p-3.5 rounded-2xl flex flex-col gap-2">
                        <a href="{{ route('register') }}" class="text-[11px] font-black bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-3 py-2.5 rounded-xl uppercase block text-center">Crear Perfil</a>
                        <a href="{{ route('login') }}" class="text-[11px] font-black bg-slate-800 text-slate-300 px-3 py-2.5 rounded-xl uppercase block text-center border border-slate-700/50">Ingresar</a>
                    </div>
                @endauth

                <div class="bg-slate-800/50 p-4 rounded-2xl border border-slate-700/50">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase">Progreso Módulo</span>
                        <span class="text-[10px] font-black text-blue-400">{{ $porcentaje ?? 0 }}%</span>
                    </div>
                    <div class="w-full bg-slate-700 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full transition-all duration-500" style="width: {{ $porcentaje ?? 0 }}%"></div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-grow p-10 overflow-y-auto bg-main-pattern">
            <header class="mb-12 cyber-header-wrapper flex justify-between items-end max-w-fit">
                <div>
                    <h1 class="cyber-title-blue text-6xl font-black tracking-tighter italic uppercase">
                        {{ request('categoria') ?? 'Central de Operaciones' }}<span class="text-blue-500 animate-pulse">_</span>
                    </h1>
                </div>
                <div class="pt-2 pr-4 hidden xl:block pl-6">
                    <div class="real-retro-mario"></div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div class="cyber-card-blue bg-[#0f172a]/90 border border-slate-800 rounded-3xl overflow-hidden shadow-xl flex flex-col justify-between transform hover:-translate-y-1.5 transition-all duration-300">
                        <div class="aspect-video bg-slate-950">
                            <iframe width="100%" height="100%" src="{{ $post['url_video'] }}" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="inline-block px-3 py-1 bg-blue-500/10 border border-blue-500/30 text-blue-400 text-[10px] font-black uppercase rounded-full">
                                    {{ $post['categoria'] }}
                                </span>
                                <h2 class="text-xl font-black text-white truncate">{{ $post['titulo'] }}</h2>
                                <p class="text-slate-400 text-xs line-clamp-2">{{ $post['descripcion'] }}</p>
                            </div>

                            <div class="pt-4 border-t border-slate-800/80">
                                @if(isset($post['aprendido']) && $post['aprendido'])
                                    <div class="flex gap-2">
                                        <div class="flex-1 text-center bg-slate-800/40 border border-slate-700/40 text-slate-500 font-bold text-xs py-3 rounded-xl uppercase tracking-wider flex items-center justify-center gap-1.5 cursor-not-allowed">
                                            <i class="fas fa-check text-emerald-500"></i> Completada
                                        </div>
                                        <a href="{{ route('juegos.index') }}" class="flex-1 text-center bg-gradient-to-r from-cyan-500 to-blue-600 text-gray-950 font-black text-xs py-3 rounded-xl uppercase flex items-center justify-center gap-1.5 shadow-lg shadow-cyan-500/20">
                                            <i class="fas fa-gamepad animate-bounce"></i> Ir a Juegos
                                        </a>
                                    </div>
                                @else
                                    <form method="POST" action="{{ route('leccion.completar', $post['id']) }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full text-center bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs py-3 rounded-xl uppercase tracking-wider transition-all flex items-center justify-center gap-1.5">
                                            <i class="fas fa-check-circle"></i> Marcar Aprendida (+40 XP)
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 border border-dashed border-slate-800 rounded-3xl">
                        <p class="text-slate-400 font-bold">No se encontraron transmisiones activas.</p>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</body>
</html>
