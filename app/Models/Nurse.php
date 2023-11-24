<?php

namespace App\Models;

use App\Enums\Province;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Nurse extends Model
{
    use HasFactory, HasUuids, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'province',
        'status',
        'registration_number',
        'effective_from',
        'expiration_date',
        'registration_class_id',
        'user_id',
        'verified',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'province' => Province::class,
        'status' => Status::class,
        'effective_from' => 'datetime',
        'expiration_date' => 'datetime',
        'verified_at' => 'datetime',
        'verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registrationClass()
    {
        return $this->belongsTo(RegistrationClass::class);
    }


    public function toSearchableArray(): array
    {
        return [
            'users.name' => '',
            'registration_classes.name' => '',
            'registration_classes.abbreviation' => '',
            'verified' => '',
            'province' => '',
            'status' => '',
            'registration_number' => '',
        ];
    }
}
