<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    /** @use HasFactory<\Database\Factories\TicketsFactory> */
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'Stadium',
        'home_team_id',
        'away_team_id',
        'home_team_score',
        'away_team_score'
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Equipe::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Equipe::class, 'away_team_id');
    }
}
