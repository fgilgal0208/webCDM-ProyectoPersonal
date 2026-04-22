<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    public function localTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'local_team_id');
    }

    // Relación con el equipo visitante
    public function visitorTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'visitor_team_id');
    }
}