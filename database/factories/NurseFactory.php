<?php

namespace Database\Factories;

use App\Models\RegistrationClass;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nurse>
 */
class NurseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'province' => 'Nova Scotia',
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'registration_number' => fake()->numerify('######'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
