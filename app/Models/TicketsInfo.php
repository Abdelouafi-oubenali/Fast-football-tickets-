<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketsInfo extends Model
{
    /** @use HasFactory<\Database\Factories\TicketsInfoFactory> */
    use HasFactory;
    protected $fillable = [
       'user_id',
       'match_id',
       'category',
       'quantity',
       'price',
       'totla_price'
    ];
}
