<?php

namespace Database\Factories;

use App\Enums\LeadStatus;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'status' => LeadStatus::Pending,
            'source' => fake()->boolean(60) ? fake()->url() : null,
            'stripe_id' => null,
        ];
    }

    public function approved(): static
    {
        return $this->state(fn () => ['status' => LeadStatus::Approved]);
    }
}
