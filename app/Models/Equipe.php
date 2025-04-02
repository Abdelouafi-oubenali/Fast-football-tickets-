<?php

namespace App\Models;

use App\Http\Controllers\TicketsController;
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
        'logo'
    ];

    public function homeMatches()
    {
        return $this->hasMany(tickets::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(tickets::class, 'away_team_id');
    }
}
