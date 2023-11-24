<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Province;
use App\Enums\Status;
use App\Models\Nurse;
use App\Models\RegistrationClass;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NurseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Nurse::create([
            'province' => Province::ALBERTA,
            'status' => Status::PENDING,
            'registration_number' => rand(1, 10) + rand(30, 100),
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        Nurse::create([
            'province' => Province::PRINCE_EDWARD_ISLAND,
            'status' => Status::PENDING,
            'registration_number' => rand(1, 10) + rand(30, 100),
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        Nurse::create([
            'province' => Province::PRINCE_EDWARD_ISLAND,
            'status' => Status::PENDING,
            'registration_number' => rand(1, 10) + rand(30, 100),
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        Nurse::create([
            'province' => Province::ONTARIO,
            'status' => Status::PENDING,
            'registration_number' => rand(1, 10) + rand(30, 100),
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        Nurse::create([
            'province' => Province::NEW_BRUNSWICK,
            'status' => Status::PENDING,
            'registration_number' => rand(1, 10) + rand(30, 100),
            'registration_class_id' => RegistrationClass::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);


    }
}
