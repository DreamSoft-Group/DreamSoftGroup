<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'email',
        'status',
        'source',
        'stripe_id',
    ];

    protected $casts = [
        'status' => 'string',
    ];
}
