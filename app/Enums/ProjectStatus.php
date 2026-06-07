<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Concept = 'concept';
    case Development = 'development';
    case Beta = 'beta';
    case Live = 'live';

    public function label(): string
    {
        return match ($this) {
            self::Concept => 'Concepto',
            self::Development => 'En Desarrollo',
            self::Beta => 'Beta',
            self::Live => 'En Vivo',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Concept => 'primary',
            self::Development => 'warning',
            self::Beta => 'accent',
            self::Live => 'success',
        };
    }

    public function tailwindBadgeClasses(): string
    {
        return match ($this) {
            self::Concept => 'bg-primary/20 border-primary/50 text-primary',
            self::Development => 'bg-yellow-500/20 border-yellow-500/50 text-yellow-500',
            self::Beta => 'bg-accent/20 border-accent/50 text-accent',
            self::Live => 'bg-green-500/20 border-green-500/50 text-green-500',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
