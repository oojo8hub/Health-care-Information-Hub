<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use JordanMiguel\LaravelPopular\Traits\Visitable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Guide extends Model
{
    use HasFactory, HasUuids, Searchable, Visitable, Favoriteable, Notifiable;

    protected $fillable = [
        'topic',
        'slug',
        'content',
        'published',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    #[SearchUsingFullText('content')]
    public function toSearchableArray(): array
    {
        // no need to return values as the database engine only uses the array keys
        return [
            'topic' => '',
            'users.name' => '', // author's name
            'categories.name' => '',
            'published' => '',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
