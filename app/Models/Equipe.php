<?php

namespace App\Models;

use Hamcrest\Matchers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'ville', 
        'founded_year',
        'coach', 
    ];

    public function homeMatches()
    {
        return $this->hasMany(Matchs::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(Matchs::class, 'away_team_id');
    }
}
