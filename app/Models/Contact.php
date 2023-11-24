<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use HasUuids, Searchable;

    protected $fillable = [
        'email',
        'subject',
        'message',
    ];

    public function toSearchableArray(): array
    {
        return [
            'subject' => '',
            'email' => '',
        ];
    }


}
