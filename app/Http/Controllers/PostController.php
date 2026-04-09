<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categoriaSeleccionada = $request->query('categoria');

        // Filtro de videos
        $posts = Post::when($categoriaSeleccionada, function ($query, $categoriaSeleccionada) {
            return $query->where('categoria', $categoriaSeleccionada);
        })->get();

        // Obtener categorías únicas para el menú lateral
        $categorias = Post::distinct()->pluck('categoria');

        return view('home', compact('posts', 'categorias', 'categoriaSeleccionada'));
    }
}
