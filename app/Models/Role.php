<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Scout\Searchable;

class Role extends \Spatie\Permission\Models\Role
{
    use HasUuids, Searchable;

    protected $casts = [
        'system_default' => 'boolean',
    ];

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
