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
        
        .gradient-text {
            background: linear-gradient(to right, #60a5fa, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

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
    </style>
</head>
<body class="bg-[#020617] text-slate-200 font-sans overflow-hidden">

    <div class="flex h-screen">
        
        <aside class="w-72 bg-[#0f172a] border-r border-slate-800 flex flex-col shadow-2xl z-20 relative">
            
            <div class="px-6 pt-10 pb-4 border-b border-slate-800/50">
                <a href="/" class="group block text-center">
                    <img 
                        src="{{ asset('images/logo-prompt-lab.png') }}" 
                        alt="Logo Prompt Lab" 
                        class="w-full h-auto object-contain logo-shadow transition-transform duration-500 group-hover:scale-105"
                    >
                </a>
            </div>

            <h3 class="text-slate-500 uppercase text-[10px] font-black mt-6 mb-4 px-8 tracking-widest">
                Módulos de Aprendizaje
            </h3>

            <nav class="space-y-2 flex-grow overflow-y-auto px-4">
                <a href="/" class="group flex items-center p-3 rounded-2xl transition-all {{ !request('categoria') ? 'bg-blue-600/20 border border-blue-500/50 text-blue-400 shadow-[0_0_20px_rgba(59,130,246,0.15)]' : 'text-slate-400 hover:bg-slate-800' }}">
                    <i class="fas fa-layer-group mr-3 text-sm"></i>
                    <span class="font-bold text-sm">Explorar Todo</span>
                </a>

                @foreach($categorias as $cat)
                    <a href="/?categoria={{ $cat }}" 
                       class="group flex items-center p-3 rounded-2xl transition-all {{ request('categoria') == $cat ? 'bg-blue-600 text-white shadow-xl shadow-blue-900/40 status-pulse' : 'text-slate-400 hover:bg-slate-800' }}">
                        @php
                            $icon = match($cat) {
                                'IA Básica' => 'fas fa-lightbulb',
                                'Algoritmos' => 'fas fa-square-root-alt',
                                'Deep Learning' => 'fas fa-brain',
                                default => 'fas fa-terminal'
                            };
                        @endphp
                        <i class="{{ $icon }} mr-3 text-sm"></i>
                        <span class="font-bold text-sm">{{ $cat }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="p-6 border-t border-slate-800">
                <div class="bg-slate-800/50 p-4 rounded-2xl border border-slate-700/50">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase">Estado Global</span>
                        <span class="text-[10px] font-black text-blue-400">12%</span>
                    </div>
                    <div class="w-full bg-slate-700 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full w-[12%] shadow-[0_0_10px_rgba(59,130,246,0.5)]"></div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-grow p-10 overflow-y-auto bg-main-pattern">
            
            <header class="mb-12 flex justify-between items-end">
                <div>
                    <h1 class="text-6xl font-black text-white tracking-tighter italic">
                        {{ request('categoria') ?? 'Central de Operaciones' }}<span class="text-blue-500">_</span>
                    </h1>
                    <p class="text-slate-400 mt-2 font-medium italic">"El conocimiento es el algoritmo más potente."</p>
                </div>
                <div class="flex gap-3">
                    <div class="bg-slate-800/80 px-4 py-2 rounded-xl border border-slate-700 text-xs font-bold text-slate-300">
                        <i class="fas fa-video mr-2 text-blue-500"></i> {{ $posts->count() }} Lecciones
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <div class="{{ request('categoria') ? 'lg:col-span-3' : 'lg:col-span-2' }} space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 {{ request('categoria') ? 'lg:grid-cols-3' : '' }} gap-8">
                        @forelse($posts as $post)
                            <div class="group bg-[#0f172a]/80 backdrop-blur-sm border border-slate-800 rounded-[2.5rem] overflow-hidden hover:border-blue-500/50 transition-all duration-500 hover:shadow-2xl">
                                <div class="relative aspect-video bg-black">
                                    <iframe width="100%" height="100%" src="{{ $post->url_video }}" frameborder="0" allowfullscreen class="opacity-70 group-hover:opacity-100 transition-opacity"></iframe>
                                    <div class="absolute top-4 left-4 flex gap-2">
                                        <span class="text-[9px] font-black bg-blue-600 text-white px-2.5 py-1 rounded-lg uppercase tracking-widest">{{ $post->categoria }}</span>
                                    </div>
                                </div>
                                <div class="p-8">
                                    <h4 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors leading-tight mb-3">{{ $post->titulo }}</h4>
                                    <p class="text-slate-400 text-sm leading-relaxed line-clamp-2 font-medium italic mb-6">"{{ $post->descripcion }}"</p>
                                    
                                    <div class="flex items-center justify-between pt-5 border-t border-slate-800/50">
                                        <div class="flex gap-4 text-xs">
                                            <span class="text-emerald-400 font-bold uppercase tracking-tighter">Principiante</span>
                                            <span class="text-blue-400 font-bold uppercase italic border-l border-slate-800 pl-4">Lección 01</span>
                                        </div>
                                        <button class="bg-blue-600 hover:bg-blue-500 p-2.5 rounded-xl text-white transition-all transform group-hover:scale-110">
                                            <i class="fas fa-play text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-32 text-center bg-slate-800/10 rounded-[3rem] border-2 border-dashed border-slate-800 italic text-slate-600">
                                Preparando nuevas transmisiones...
                            </div>
                        @endforelse
                    </div>
                </div>

                @if(!request('categoria'))
                <aside class="space-y-8">
                    <div class="bg-gradient-to-br from-indigo-600/20 to-purple-900/30 p-8 rounded-[3rem] border border-purple-500/20 shadow-xl relative overflow-hidden group">
                        <div class="absolute -right-6 -top-6 opacity-10 group-hover:rotate-12 transition-transform duration-700 text-9xl">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <div class="relative z-10">
                            <span class="bg-purple-500 text-[9px] font-black px-2 py-1 rounded-lg text-white uppercase">Interactivo</span>
                            <h3 class="text-2xl font-black text-white mt-4 mb-2 tracking-tighter uppercase italic">Prompt Challenge</h3>
                            <p class="text-slate-400 text-xs leading-relaxed mb-6">Domina la IA a través del juego. Resuelve retos de lógica y gana XP.</p>
                            <button class="w-full bg-white/10 hover:bg-purple-600 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-white/10 transition-all shadow-lg">
                                <i class="fas fa-lock mr-2"></i> Iniciar Desafío
                            </button>
                        </div>
                    </div>

                    <div class="bg-slate-800/30 p-8 rounded-[3rem] border border-slate-800">
                        <h3 class="text-[10px] font-black text-slate-500 mb-6 uppercase tracking-widest text-center">Ruta de Carrera</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-500 border border-blue-500/20 text-[10px]">01</div>
                                <p class="text-[11px] text-slate-400 font-bold uppercase italic">Bases del Lenguaje</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-lg bg-slate-700 flex items-center justify-center text-slate-500 text-[10px]">02</div>
                                <p class="text-[11px] text-slate-600 font-bold uppercase italic">Ingeniería de Prompts</p>
                            </div>
                        </div>
                    </div>
                </aside>
                @endif

            </div>
        </main>
    </div>

</body>
</html>
