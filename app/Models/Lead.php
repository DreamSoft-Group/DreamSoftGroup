<?php

namespace App\Models;

use App\Enums\LeadStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\LeadFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'status',
        'source',
        'stripe_id',
    ];

    protected $casts = [
        'status' => LeadStatus::class,
    ];

    public static function booted(): void
    {
        static::creating(function (self $lead): void {
            $lead->status ??= LeadStatus::Pending;
        });
    }
}
