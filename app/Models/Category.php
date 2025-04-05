<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nom', 'prix', 'prix_abonne', 'actif'];

    public function match()
    {
        return $this->belongsTo(tickets::class, 'match_id');
    }
    
}
