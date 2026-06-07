<?php

namespace Database\Seeders;

use App\Models\DevLog;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@dreamsoftgroup.com',
        ]);

        $projects = Project::factory()
            ->count(6)
            ->sequence(
                ['status' => 'live'],
                ['status' => 'beta'],
                ['status' => 'development'],
                ['status' => 'concept'],
                ['status' => 'live'],
                ['status' => 'beta'],
            )
            ->create();

        foreach ($projects as $project) {
            DevLog::factory()
                ->count(random_int(2, 5))
                ->published()
                ->for($project)
                ->create();
        }

        Lead::factory()->count(15)->create();
    }
}
