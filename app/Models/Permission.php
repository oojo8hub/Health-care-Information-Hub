<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Scout\Searchable;


class Permission extends \Spatie\Permission\Models\Permission
{
    use HasUuids, Searchable;

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

}
