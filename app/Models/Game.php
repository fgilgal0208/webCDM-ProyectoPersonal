<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Asegúrate de que 'jornada' está aquí
    protected $fillable = [
        'jornada', 
        'local_team_id', 
        'visitor_team_id', 
        'goles_local', 
        'goles_visitante', 
        'fecha_partido'
    ];

    public function localTeam()
    {
        return $this->belongsTo(Team::class, 'local_team_id');
    }

    public function visitorTeam()
    {
        return $this->belongsTo(Team::class, 'visitor_team_id');
    }
}