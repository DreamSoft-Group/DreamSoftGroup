<?php

namespace App\Models;

use App\Enums\ProjectAccessLevel;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

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
        'status' => ProjectStatus::class,
        'access_level' => ProjectAccessLevel::class,
    ];

    protected static function booted(): void
    {
        static::saving(function (self $project): void {
            if (empty($project->slug) || $project->isDirty('title')) {
                $project->slug = static::generateUniqueSlug($project->title, $project->id);
            }
        });
    }

    public static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $counter = 1;

        $query = static::query()->where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->exists()) {
            $slug = $base.'-'.$counter++;
            $query = static::query()->where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
        }

        return $slug;
    }

    public function devLogs()
    {
        return $this->hasMany(DevLog::class);
    }

    public function publishedDevLogs()
    {
        return $this->hasMany(DevLog::class)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at');
    }

    public function isPubliclyAccessible(): bool
    {
        return $this->access_level === ProjectAccessLevel::Free;
    }

    public function coverImageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->cover_image) {
                return null;
            }

            if (str_starts_with($this->cover_image, ['http://', 'https://'])) {
                return $this->cover_image;
            }

            return Storage::url($this->cover_image);
        });
    }
}
