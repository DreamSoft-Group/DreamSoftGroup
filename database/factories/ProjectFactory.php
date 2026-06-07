<?php

namespace Database\Factories;

use App\Enums\ProjectAccessLevel;
use App\Enums\ProjectStatus;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::random(5),
            'short_description' => fake()->paragraph(),
            'html_description' => '<p>'.fake()->paragraphs(3, true).'</p>',
            'cover_image' => null,
            'demo_url' => fake()->boolean(40) ? fake()->url() : null,
            'status' => ProjectStatus::Development,
            'access_level' => ProjectAccessLevel::Free,
        ];
    }

    public function live(): static
    {
        return $this->state(fn () => ['status' => ProjectStatus::Live]);
    }

    public function beta(): static
    {
        return $this->state(fn () => ['status' => ProjectStatus::Beta]);
    }

    public function waitlist(): static
    {
        return $this->state(fn () => ['access_level' => ProjectAccessLevel::Waitlist]);
    }

    public function premium(): static
    {
        return $this->state(fn () => ['access_level' => ProjectAccessLevel::Premium]);
    }
}
