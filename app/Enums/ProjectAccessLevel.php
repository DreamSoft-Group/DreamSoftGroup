<?php

namespace App\Enums;

enum ProjectAccessLevel: string
{
    case Free = 'free';
    case Waitlist = 'waitlist';
    case Premium = 'premium';

    public function label(): string
    {
        return match ($this) {
            self::Free => 'Gratis',
            self::Waitlist => 'Lista de Espera',
            self::Premium => 'Premium',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Free => 'success',
            self::Waitlist => 'warning',
            self::Premium => 'danger',
        };
    }

    public function isPubliclyViewable(): bool
    {
        return $this === self::Free;
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
