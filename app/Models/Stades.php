<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stades extends Model
{
    /** @use HasFactory<\Database\Factories\StadesFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'capacity',
        'ville',
        'adresse'
    ];
}
