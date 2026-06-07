<?php

namespace Tests\Unit;

use App\Enums\LeadStatus;
use App\Enums\ProjectAccessLevel;
use App\Enums\ProjectStatus;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_status_is_cast_to_enum(): void
    {
        $project = Project::factory()->create(['status' => ProjectStatus::Live]);

        $this->assertInstanceOf(ProjectStatus::class, $project->status);
    }

    public function test_access_level_is_cast_to_enum(): void
    {
        $project = Project::factory()->create(['access_level' => ProjectAccessLevel::Premium]);

        $this->assertInstanceOf(ProjectAccessLevel::class, $project->access_level);
    }

    public function test_is_publicly_accessible_only_for_free_projects(): void
    {
        $free = Project::factory()->create(['access_level' => ProjectAccessLevel::Free]);
        $waitlist = Project::factory()->create(['access_level' => ProjectAccessLevel::Waitlist]);

        $this->assertTrue($free->isPubliclyAccessible());
        $this->assertFalse($waitlist->isPubliclyAccessible());
    }

    public function test_published_dev_logs_excludes_drafts_and_future(): void
    {
        $project = Project::factory()->create();

        $project->devLogs()->create([
            'title' => 'Publicado Ayer',
            'content' => '...',
            'published_at' => now()->subDay(),
        ]);
        $project->devLogs()->create([
            'title' => 'Borrador',
            'content' => '...',
            'published_at' => null,
        ]);
        $project->devLogs()->create([
            'title' => 'Futuro',
            'content' => '...',
            'published_at' => now()->addDay(),
        ]);

        $titles = $project->publishedDevLogs->pluck('title')->all();

        $this->assertContains('Publicado Ayer', $titles);
        $this->assertNotContains('Borrador', $titles);
        $this->assertNotContains('Futuro', $titles);
    }
}
