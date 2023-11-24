<?php

namespace App\Enums;

enum Province: string
{
    case ALBERTA = 'Alberta';
    case BRITISH_COLUMBIA = 'British Columbia';
    case MANITOBA = 'Manitoba';
    case NEW_BRUNSWICK = 'New Brunswick';
    case NEWFOUNDLAND_AND_LABRADOR = 'Newfoundland and Labrador';
    case NORTHWEST_TERRITORIES = 'Northwest Territories';
    case NOVA_SCOTIA = 'Nova Scotia';
    case NUNAVUT = 'Nunavut';
    case ONTARIO = 'Ontario';
    case PRINCE_EDWARD_ISLAND = 'Prince Edward Island';
    case QUEBEC = 'Quebec';
    case SASKATCHEWAN = 'Saskatchewan';
    case YUKON = 'Yukon';

    public static function values(): array
    {
        return array_column(self::cases(),  'value', 'name');
    }

}
