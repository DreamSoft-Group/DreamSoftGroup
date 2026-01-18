<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevLog extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'content',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
