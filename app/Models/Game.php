<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Quitamos los bloqueos de seguridad para el Seeder
    protected $guarded = [];

    // Relación con el equipo local
    public function localTeam()
    {
        return $this->belongsTo(Team::class, 'local_team_id');
    }

    // Relación con el equipo visitante
    public function visitorTeam()
    {
        return $this->belongsTo(Team::class, 'visitor_team_id');
    }
}