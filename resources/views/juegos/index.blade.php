<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Lab | Zona de Juegos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d946ef; }

        .bg-main-pattern {
            background-color: #020617;
            background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
            background-size: 250px;
            background-attachment: fixed;
        }

        .cyber-title { color: #ffffff; transition: color 0.2s, text-shadow 0.2s; cursor: default; }
        .cyber-title:hover { color: #d946ef; text-shadow: 0 0 15px rgba(217, 70, 239, 0.6); }

        .logo-shadow { filter: drop-shadow(0 0 15px rgba(217, 70, 239, 0.25)); }

        .cyber-bar-container {
            position: absolute; top: 0; left: 0; width: 100%; height: 24px;
            background: rgba(15, 23, 42, 0.8); border-bottom: 2px solid rgba(217, 70, 239, 0.6);
            overflow: hidden; box-shadow: 0 4px 30px rgba(217, 70, 239, 0.4);
        }

        .cyber-bar-grid {
            position: absolute; inset: 0; z-index: 2;
            background-size: 8px 100%; background-image: linear-gradient(90deg, rgba(2, 6, 23, 0.5) 50%, transparent 50%);
        }

        .cyber-bar-fill {
            position: absolute; inset: 0; width: 100%; height: 100%; z-index: 1;
            background: linear-gradient(90deg, #7c3aed, #d946ef, #f43f5e, #7c3aed);
            background-size: 300% 100%; animation: moveGradient 8s linear infinite;
        }

        .cyber-bar-laser {
            position: absolute; top: 0; width: 150px; height: 100%; z-index: 3;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.9), transparent);
            transform: skewX(-30deg); animation: laserSweep 3s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        @keyframes moveGradient { 0% { background-position: 0% 50%; } 100% { background-position: 300% 50%; } }
        @keyframes laserSweep { 0% { left: -20%; } 100% { left: 120%; } }

        .cyber-card { position: relative; overflow: hidden; }
        .cyber-card::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: linear-gradient(45deg, transparent, rgba(217, 70, 239, 0.1), transparent);
            transform: rotate(45deg); transition: 0.6s; opacity: 0;
        }
        .cyber-card:hover::before { animation: shine 1.2s ease-in-out; }
        @keyframes shine {
            0% { transform: translate(-30%, -30%) rotate(45deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translate(30%, 30%) rotate(45deg); opacity: 0; }
        }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 font-sans min-h-screen bg-main-pattern pt-12 p-6 md:p-10 antialiased">

    <div class="cyber-bar-container z-50">
        <div class="cyber-bar-fill"></div>
        <div class="cyber-bar-grid"></div>
        <div class="cyber-bar-laser"></div>
    </div>

    <div class="max-w-7xl mx-auto mt-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 mb-12 pb-6 border-b border-fuchsia-500/20">
            <a href="{{ route('home') }}" class="group flex items-center gap-2 text-[10px] font-black uppercase tracking-widest bg-slate-900/80 text-slate-400 hover:text-fuchsia-400 px-5 py-3 rounded-xl border border-slate-800 hover:border-fuchsia-500/40 transition-all duration-300">
                <i class="fas fa-arrow-left transition-transform group-hover:-translate-x-1.5"></i> Volver a la Central
            </a>
            <div class="w-48 sm:w-56">
                <img src="{{ asset('images/logo-prompt-lab.png') }}" alt="Logo Prompt Lab" class="w-full h-auto object-contain logo-shadow">
            </div>
        </div>

        <header class="mb-16 text-center relative">
            <h1 class="cyber-title text-4xl md:text-5xl font-black tracking-tighter italic uppercase inline-block">
                🎮 Anomalías Lúdicas<span class="text-fuchsia-500 animate-pulse">_</span>
            </h1>
            <p class="text-slate-400 mt-3 italic text-sm tracking-wide">"Pon a prueba tu rapidez mental divirtiéndote."</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center items-stretch">
            @foreach($juegos as $juego)
                <div class="cyber-card group bg-[#0f172a]/60 backdrop-blur-md border border-slate-800/80 rounded-[2rem] overflow-hidden hover:border-fuchsia-500/50 transition-all duration-500 flex flex-col justify-between h-full transform hover:-translate-y-2">
                    <div class="relative w-full aspect-video bg-slate-950 overflow-hidden shrink-0 border-b border-slate-800/30">
                        <img src="{{ $juego['imagen'] }}" alt="{{ $juego['titulo'] }}" class="w-full h-full object-cover opacity-40 group-hover:opacity-70 group-hover:scale-110 transition-all duration-700">
                        <div class="absolute top-4 left-4 z-20">
                            <span class="text-[9px] font-black bg-fuchsia-600/90 text-white px-3 py-1.5 rounded-xl uppercase tracking-widest border border-fuchsia-400/30">
                                {{ $juego['tipo'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between relative z-20">
                        <div>
                            <h3 class="text-xl font-black text-white group-hover:text-fuchsia-400 transition-colors h-14 flex items-center line-clamp-2">
                                {{ $juego['titulo'] }}
                            </h3>
                            <p class="text-slate-400/90 text-xs mb-6 font-medium leading-relaxed line-clamp-2">
                                Desafío interactivo preparado para complementar tu lección actual y maximizar tu retención de datos.
                            </p>
                        </div>

                        <div class="mt-auto shrink-0">
                            <a href="{{ route('juegos.completar', ['id' => $juego['id']]) }}?url={{ urlencode($juego['url']) }}" 
                               target="_blank" 
                               class="block w-full text-center bg-fuchsia-600 hover:bg-fuchsia-500 py-3.5 rounded-xl text-xs font-black uppercase tracking-widest text-white flex items-center justify-center gap-2 transition-all shadow-lg shadow-fuchsia-900/40">
                                <i class="fas fa-play text-[9px] animate-pulse"></i> Iniciar Juego (+100 XP)
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
