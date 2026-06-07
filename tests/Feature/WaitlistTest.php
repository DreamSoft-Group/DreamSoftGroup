<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WaitlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_subscribe_to_waitlist(): void
    {
        $response = $this->postJson(route('waitlist.store'), [
            'email' => 'fan@dreamsoftgroup.com',
        ]);

        $response->assertCreated()
            ->assertJson(['already_registered' => false]);

        $this->assertDatabaseHas('leads', [
            'email' => 'fan@dreamsoftgroup.com',
            'status' => 'pending',
        ]);
    }

    public function test_existing_email_returns_200_and_does_not_duplicate(): void
    {
        Lead::factory()->create(['email' => 'repeat@example.com']);

        $response = $this->postJson(route('waitlist.store'), [
            'email' => 'repeat@example.com',
        ]);

        $response->assertJson(['already_registered' => true]);

        $this->assertSame(1, Lead::where('email', 'repeat@example.com')->count());
    }

    public function test_invalid_email_is_rejected(): void
    {
        $response = $this->postJson(route('waitlist.store'), [
            'email' => 'not-an-email',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors('email');
    }

    public function test_email_is_required(): void
    {
        $response = $this->postJson(route('waitlist.store'), []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors('email');
    }

    public function test_waitlist_endpoint_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->postJson(route('waitlist.store'), ['email' => "user{$i}@example.com"])->assertSuccessful();
        }

        $this->postJson(route('waitlist.store'), ['email' => 'blocked@example.com'])
            ->assertTooManyRequests();
    }
}
