<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'categoria', 'url_video', 'teoria'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'leccion_user')
                    ->withPivot('xp_ganada', 'tipo_actividad')
                    ->withTimestamps();
    }

    public function getUrlVideoAttribute($value)
    {
        if (str_contains($value, 'watch?v=')) {
            $parts = explode('v=', $value);
            $videoId = explode('&', $parts[1])[0];
            return "https://www.youtube.com/embed/" . $videoId;
        }
        
        if (str_contains($value, 'youtu.be/')) {
            $parts = explode('youtu.be/', $value);
            $videoId = explode('?', $parts[1])[0];
            return "https://www.youtube.com/embed/" . $videoId;
        }

        return $value;
    }
}
