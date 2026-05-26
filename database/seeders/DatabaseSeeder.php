<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos la tabla para evitar duplicados
        Post::truncate();

        
    }
}
