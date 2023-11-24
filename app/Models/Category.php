<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, HasUuids, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'system_default',
        'active',
    ];

    protected $casts = [
        'system_default' => 'boolean',
        'active' => 'boolean',
    ];

    public function guides(): HasMany
    {
        return $this->hasMany(Guide::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => '',
            'active' => ''
        ];
    }

    public function publishedGuides(): HasMany
    {
        return $this->guides()->where('published', '=', 1);
    }

}
