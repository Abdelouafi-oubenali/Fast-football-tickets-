<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketsInfo extends Model
{
    protected $table = 'tickets_infos'; 

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
        return $this->belongsTo(tickets::class, 'match_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}