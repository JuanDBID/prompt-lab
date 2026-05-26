<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leccion_user', function (Blueprint $blueprint) {
            $blueprint->id();
            
            // Relación con el usuario que inicia sesión
            $blueprint->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // CORREGIDO: Usamos 'post_id' apuntando a 'posts' para que coincida perfectamente con tu modelo Post
            $blueprint->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            
            // NUEVO: Columna para guardar los puntos ganados (Evita el error "no such column: leccion_user.xp_ganada")
            $blueprint->integer('xp_ganada')->default(0);
            
            // NUEVO: Columna para saber si los puntos vienen de un 'video', 'juego' o 'teoria'
            $blueprint->string('tipo_actividad')->default('video'); 
            
            // Tu columna original de estado
            $blueprint->boolean('completada')->default(true);
            
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leccion_user');
    }
};
