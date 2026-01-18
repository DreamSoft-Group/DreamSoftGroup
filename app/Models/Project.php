<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'html_description',
        'cover_image',
        'demo_url',
        'status',
        'access_level',
    ];

    protected $casts = [
        'status' => 'string',
        'access_level' => 'string',
    ];

    public function devLogs()
    {
        return $this->hasMany(DevLog::class);
    }
}
