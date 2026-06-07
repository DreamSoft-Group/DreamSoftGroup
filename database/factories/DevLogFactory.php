<?php

namespace Database\Factories;

use App\Models\DevLog;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DevLog>
 */
class DevLogFactory extends Factory
{
    protected $model = DevLog::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->sentence(6),
            'content' => '<p>'.fake()->paragraphs(4, true).'</p>',
            'published_at' => fake()->boolean(80) ? fake()->dateTimeBetween('-1 year', 'now') : null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'published_at' => now()->subDay(),
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn () => ['published_at' => null]);
    }
}
