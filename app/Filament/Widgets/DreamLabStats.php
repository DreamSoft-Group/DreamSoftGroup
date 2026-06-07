<?php

namespace App\Filament\Widgets;

use App\Enums\LeadStatus;
use App\Enums\ProjectStatus;
use App\Models\DevLog;
use App\Models\Lead;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DreamLabStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Proyectos', Project::count())
                ->description(Project::where('status', ProjectStatus::Live)->count().' en vivo · '.Project::where('status', ProjectStatus::Beta)->count().' en beta')
                ->descriptionIcon('heroicon-m-rocket-launch')
                ->color('primary'),

            Stat::make('DevLogs publicadas', DevLog::query()->published()->count())
                ->description('Última: '.optional(DevLog::query()->published()->latest('published_at')->first())->published_at?->diffForHumans() ?? '—')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Leads', Lead::count())
                ->description(Lead::where('status', LeadStatus::Pending)->count().' pendientes')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
        ];
    }
}
