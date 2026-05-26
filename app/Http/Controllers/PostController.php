<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Almacén central de juegos para que sea dinámico en todo el controlador
    private function obtenerBancoDeJuegos()
    {
        return [
            ['id' => 2, 'titulo' => 'Inteligencia artificial celebriti', 'url' => 'https://www.cerebriti.com/juegos-de-tecnologia/inteligencia-artificial/', 'tipo' => 'celebriti', 'imagen' => asset('images/celebriti.png')],
            ['id' => 2, 'titulo' => 'Inteligencia datos basicos artificial educaplay', 'url' => 'https://es.educaplay.com/recursos-educativos/17336676-juego_de_inteligencia_artificial.html', 'tipo' => 'educaplay', 'imagen' => asset('images/educaplay.png')],
            ['id' => 2, 'titulo' => 'Red neuronal artificial celebriti', 'url' => 'https://www.cerebriti.com/juegos-de-tecnologia/red-neuronal-artificial', 'tipo' => 'celebriti', 'imagen' => asset('images/celebriti_Red_neuronal.png')],
            ['id' => 2, 'titulo' => 'Que es la inteligencia artificial celebriti', 'url' => 'https://www.cerebriti.com/juegos-de-tecnologia/que-es-la-ia2', 'tipo' => 'celebriti', 'imagen' => asset('images/celebriti_Que_esInteligencia.png')],
            ['id' => 1, 'titulo' => 'Regresión Lineal wordwall', 'url' => 'https://wordwall.net/es/resource/6001643/regresi%C3%B3n-lineal', 'tipo' => 'wordwall', 'imagen' => asset('images/Regresion_Lineal.png')],
        ];
    }

    public function index(Request $request)
    {
        $categoriaSeleccionada = $request->query('categoria');

        // Banco de Datos Local (Lecciones / Videos)
        $todosLosPosts = [
            [
                'id' => 1,
                'titulo' => 'Regresion Lineal',
                'descripcion' => 'Introducción didáctica al ML.',
                'categoria' => 'Algoritmos',
                'url_video' => 'https://www.youtube.com/watch?v=gfs5bp2j_bA',
            ],
            [
                'id' => 2,
                'titulo' => 'Que es IA',
                'descripcion' => 'Cómo ven las máquinas.',
                'categoria' => 'IA Básica',
                'url_video' => 'https://www.youtube.com/watch?v=-NXUk2P2qKc',
            ],
            [
                'id' => 3,
                'titulo' => 'Prompt',
                'descripcion' => 'Logica para programar.',
                'categoria' => 'Deep Learning',
                'url_video' => 'https://www.youtube.com/watch?v=C73JIUeOoLw',
            ]
        ];

        // Normalizar videos a formato Embed
        foreach ($todosLosPosts as &$post) {
            $post['url_video'] = $this->convertirAEmbed($post['url_video']);
        }
        unset($post);

        // Filtrado por categoría si existe
        if (!empty($categoriaSeleccionada)) {
            $posts = array_filter($todosLosPosts, function($post) use ($categoriaSeleccionada) {
                return $post['categoria'] === $categoriaSeleccionada;
            });
        } else {
            $posts = $todosLosPosts;
        }

        $categorias = ['IA Básica', 'Algoritmos', 'Deep Learning'];
        
        // Conteo dinámico de los dos bancos de datos locales
        $totalLecciones = count($todosLosPosts);
        $totalJuegos = count($this->obtenerBancoDeJuegos());
        
        $porcentaje = 0;
        $totalXp = 0;
        $idsAprendidos = [];

        // El techo de XP ahora se expande o encoge solo según lo que metas en las listas
        $xpMaximoModulo = ($totalLecciones * 40) + ($totalLecciones * 150) + ($totalJuegos * 100); 

        if (Auth::check()) {
            $usuario = Auth::user();
            
            // IDs de videos completados para cambiar el botón visual en el Home
            $idsAprendidos = $usuario->posts()
                ->wherePivot('tipo_actividad', 'video')
                ->pluck('post_id')
                ->toArray();

            // Suma total de toda la XP acumulada en la tabla pivote
            $totalXp = $usuario->posts()->sum('leccion_user.xp_ganada') ?? 0;

            if ($xpMaximoModulo > 0) {
                $porcentaje = round(($totalXp / $xpMaximoModulo) * 100);
                if ($porcentaje > 100) { $porcentaje = 100; }
            }
        }

        foreach ($posts as &$p) {
            $p['aprendido'] = in_array($p['id'], $idsAprendidos);
        }
        unset($p);

        // CORRECCIÓN: Se eliminó la línea json_decode/json_encode que causaba conflictos de memoria.

        return view('home', compact('posts', 'categorias', 'categoriaSeleccionada', 'porcentaje', 'totalXp'));
    }

    // CORRECCIÓN: Función optimizada con strpos() para máxima compatibilidad con cualquier versión de PHP
    private function convertirAEmbed($url)
    {
        if (strpos($url, 'youtube.com/embed/') !== false) { return $url; }
        if (strpos($url, 'watch?v=') !== false) {
            $parts = explode('v=', $url);
            $videoId = explode('&', $parts[1])[0];
            return "https://www.youtube.com/embed/" . $videoId;
        }
        if (strpos($url, 'youtu.be/') !== false) {
            $parts = explode('youtu.be/', $url);
            $videoId = explode('?', $parts[1])[0];
            return "https://www.youtube.com/embed/" . $videoId;
        }
        return $url;
    }

    // Completar Video (Único pago de +40 XP)
    public function completarLeccion($id)
    {
        if (Auth::check()) {
            $usuario = Auth::user();
            
            $yaVisto = $usuario->posts()
                ->where('post_id', $id)
                ->wherePivot('tipo_actividad', 'video')
                ->exists();

            if (!$yaVisto) {
                $usuario->posts()->attach($id, [
                    'xp_ganada' => 40, 
                    'tipo_actividad' => 'video'
                ]);
                return redirect()->back()->with('success', '¡+40 XP Ganados!');
            }
            return redirect()->back()->with('info', 'Ya recibiste XP por este video.');
        }
        return redirect()->route('register');
    }

    // Completar Juego (Acumulable infinito: +100 XP por clic)
    public function completarJuego(Request $request, $id)
    {
        if (Auth::check()) {
            $usuario = Auth::user();
            
            $usuario->posts()->attach($id, [
                'xp_ganada' => 100, 
                'tipo_actividad' => 'juego'
            ]);
        }
        
        return redirect($request->query('url', route('juegos.index')));
    }

    // Listado de la Zona de Juegos
    public function juegos()
    {
        $juegos = $this->obtenerBancoDeJuegos();
        return view('juegos.index', compact('juegos'));
    }

    // Renderizar la Vista de Teoría
    public function mostrarTeoria($id)
    {
        $titulos = [1 => 'Regresión Lineal', 2 => 'Qué es IA', 3 => 'Prompt Engineering'];
        $titulo = $titulos[$id] ?? 'Módulo Teórico';
        $categorias = [1 => 'Algoritmos', 2 => 'IA Básica', 3 => 'Deep Learning'];
        $categoria = $categorias[$id] ?? 'General';

        $post = (object)[
            'id' => $id,
            'titulo' => $titulo,
            'categoria' => $categoria,
            'teoria' => 'Contenido de profundización rápida para la lección elegida. Repasa los conceptos fundamentales de los algoritmos y afianza los conocimientos multimedia vistos en el laboratorio.'
        ];
        return view('juegos.teoria', compact('post'));
    }

    // Guardar lectura de teoría (Único pago de +150 XP)
    public function completarTeoria($id)
    {
        if (Auth::check()) {
            $usuario = Auth::user();
            
            $yaLeido = $usuario->posts()
                ->where('post_id', $id)
                ->wherePivot('tipo_actividad', 'teoria')
                ->exists();

            if (!$yaLeido) {
                $usuario->posts()->attach($id, [
                    'xp_ganada' => 150, 
                    'tipo_actividad' => 'teoria'
                ]);
                return redirect()->route('home')->with('success', '¡+150 XP por teoría!');
            }
        }
        return redirect()->route('home');
    }
}
