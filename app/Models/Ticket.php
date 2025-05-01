<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'Ticket'; 

    protected $fillable = [
        'user_id',
        'match_id',
        'category',
        'quantity',
        'status',
        'price',
        'totla_price',
        'paid_at' 
    ];

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}