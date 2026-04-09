<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Importamos el modelo para que funcione

class DatabaseSeeder extends Seeder
{
        public function run(): void
    {
        \App\Models\Post::create([
            'titulo' => 'Machine Learning para todos',
            'descripcion' => 'Introducción didáctica al ML.',
            'categoria' => 'Machine Learning',
            'url_video' => 'https://www.youtube.com/embed/K5q8Zz_JvI8' 
        ]);

        \App\Models\Post::create([
            'titulo' => 'Visión Artificial',
            'descripcion' => 'Cómo ven las máquinas.',
            'categoria' => 'Visión Artificial',
            'url_video' => 'https://www.youtube.com/embed/V6Z_Y_T9K9I'
        ]);

        \App\Models\Post::create([
            'titulo' => 'Introducción al NLP',
            'descripcion' => 'Procesamiento de Lenguaje Natural.',
            'categoria' => 'NLP',
            'url_video' => 'https://www.youtube.com/embed/OzzjD9mHl-4'
        ]);
    }
}
