<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'status', 'paid_at'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
