<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_lists_published_projects(): void
    {
        Project::factory()->create([
            'title' => 'Visible Alpha',
            'access_level' => 'free',
        ]);
        Project::factory()->create([
            'title' => 'Visible Beta',
            'access_level' => 'free',
        ]);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Visible Alpha')
            ->assertSee('Visible Beta');
    }

    public function test_project_show_page_renders(): void
    {
        $project = Project::factory()->create([
            'title' => 'Mi Producto',
            'short_description' => 'Una descripción increíble.',
        ]);

        $response = $this->get(route('projects.show', $project->slug));

        $response->assertOk()
            ->assertSeeText('Mi Producto')
            ->assertSeeText('DevLog');
    }

    public function test_unknown_slug_returns_404(): void
    {
        $this->get('/projects/no-existe-este-slug')->assertNotFound();
    }

    public function test_slug_is_generated_automatically_from_title(): void
    {
        $project = Project::factory()->create(['title' => 'Sin Slug Explicito']);

        $this->assertNotEmpty($project->slug);
        $this->assertStringContainsString('sin-slug', $project->slug);
    }
}
