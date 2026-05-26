<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Lab | Laboratorio de Profundización</title>
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

        .cyber-theory-title {
            color: #ffffff;
            transition: color 0.2s ease-in-out, text-shadow 0.2s ease-in-out;
            cursor: default;
        }
        
        .cyber-header-theory:hover .cyber-theory-title {
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
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h5v1H3zm5 0h3v1H8zm-6 1h8v1H2zm0 1h9v1H2zm0 1h7v1H2zm-1 1h8v1H1zm0 1h3v1H1zm5 0h3v1H6zm-5 1h2v1H1zm6 0h2v1H7z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 6h2v1H2zm5 0h2v1H7zm-6 1h3v1H1zm6 0h3v1H7z' fill='%23704000'/></svg>");
            animation: marioRetroRun 0.25s steps(1) infinite;
        }

        @keyframes marioRetroRun {
            0%, 100% {
                background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h5v1H3zm5 0h3v1H8zm-6 1h8v1H2zm0 1h9v1H2zm0 1h7v1H2zm-1 1h8v1H1zm0 1h3v1H1zm5 0h3v1H6zm-5 1h2v1H1zm6 0h2v1H7z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 6h2v1H2zm5 0h2v1H7zm-6 1h3v1H1zm6 0h3v1H7z' fill='%23704000'/></svg>");
                transform: scaleX(-1) translateY(0px);
            }
            50% {
                background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 13'><path d='M3 0h6v1H3zm-1 1h8v1H2zm0 1h3v1H2zm4 0h1v1H6zm2 0h2v1H8zm-6 3h2v1H2zm3 0h4v1H5zm4 0h2v1H9zm-6 1h4v1H3zm5 0h3v1H8zm-6 1h7v1H2zm0 1h9v1H2zm1 1h8v1H3zm0 1h8v1H3zm-1 1h3v1H2zm5 0h3v1H7zm-2 1h2v1H5zm-3 0h2v1H2zm6 0h2v1H8z' fill='%23FF2400'/><path d='M3 2h3v1H3zm0 1h2v1H3zm5 0h1v1H8z' fill='%23FFAA00'/><path d='M2 3h1v1H2zm4 0h2v1H6zm3 0h1v1H9zm-7 1h1v1H2zm2 0h5v1H4zm-1 1h1v1H3zm4 0h1v1H7zm-5 1h1v1H2zm6 0h2v1H8z' fill='%23000'/><path d='M3 5h2v1H3zm-1 6h2v1H2zm7 0h2v1H9zm-2 1h2v1H5zm-4 0h2v1H2zm6 0h2v1H8z' fill='%23704000'/></svg>");
                transform: scaleX(-1) translateY(-2px);
            }
        }

        .cyber-header-theory:hover .real-retro-mario {
            animation-duration: 0.12s;
            filter: drop-shadow(0 0 15px #3b82f6) hue-rotate(45deg);
        }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 font-sans min-h-screen bg-main-pattern p-6 md:p-10">

    <div class="max-w-4xl mx-auto bg-[#0f172a]/90 backdrop-blur-md border border-slate-800 rounded-[2.5rem] p-8 md:p-12 shadow-2xl">
        
        <header class="mb-8 border-b border-slate-800 pb-6 cyber-header-theory">
            <div class="flex justify-between items-start gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-[10px] font-black bg-blue-600 text-white px-2.5 py-1 rounded-lg uppercase tracking-widest shadow-md">
                            {{ $post->categoria }}
                        </span>
                        <span class="text-[10px] font-black bg-emerald-600/20 text-emerald-400 border border-emerald-500/30 px-2.5 py-1 rounded-lg uppercase tracking-widest">
                            🧠 Módulo Teórico
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-tight cyber-theory-title">
                        {{ $post->titulo }}
                    </h1>
                </div>

                <div class="hidden sm:block pt-2">
                    <div class="real-retro-mario"></div>
                </div>
            </div>
        </header>

        <article class="prose prose-invert max-w-none text-slate-300 leading-relaxed space-y-6 text-base md:text-lg italic">
            @if($post->teoria)
                {!! nl2br(e($post->teoria)) !!}
            @else
                <p class="text-slate-500">No hay contenido teórico registrado para esta lección aún. ¡Pronto estará disponible!</p>
            @endif
        </article>

        <div class="mt-12 pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-emerald-500/10 p-3 rounded-xl border border-emerald-500/20 text-emerald-400">
                    <i class="fas fa-bolt text-xl animate-pulse"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider">¿Terminaste la lectura?</h4>
                    <p class="text-xs text-slate-400">Completa este bloque de profundización para asimilar el algoritmo.</p>
                </div>
            </div>

            <form action="{{ route('leccion.teoria.completar', $post->id) }}" method="POST" class="w-full sm:w-auto">
                @csrf
                <button type="submit" class="w-full sm:w-auto text-center bg-gradient-to-r from-emerald-600 to-teal-500 hover:from-emerald-500 hover:to-teal-400 px-8 py-4 rounded-xl text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-emerald-950/50 text-white active:scale-95">
                    <i class="fas fa-check-circle mr-2"></i> Concluir e Inyectar +150 XP
                </button>
            </form>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 hover:text-slate-300 transition-colors uppercase tracking-widest">
                <i class="fas fa-arrow-left mr-1"></i> Volver al panel general
            </a>
        </div>

    </div>

</body>
</html>
