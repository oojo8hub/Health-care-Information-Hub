<?php

namespace App\Enums;

enum Status: string
{
    case PENDING = 'pending';
    case VERIFIED = 'verified';
    case DENIED = 'denied';

    public static function values(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

}
