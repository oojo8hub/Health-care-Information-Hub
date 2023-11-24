<?php

namespace App\Enums;

enum Entity: string
{
    case NURSE = 'nurse';
    case PERMISSION = 'permission';
    case ROLE = 'role';
    case USER = 'user';


    public static function values(): array
    {
        return array_column(self::cases(),  'value', 'name');
    }

}
