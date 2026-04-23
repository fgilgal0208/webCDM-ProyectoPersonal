<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    // 1. Quitamos los bloqueos de seguridad para el Seeder
    protected $guarded = [];

    // 2. Le enseñamos a conectarse con la tabla de Equipos
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}