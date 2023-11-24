<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RegistrationClass;
use Illuminate\Database\Seeder;

class RegistrationClassSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create RegistrationClasses
        RegistrationClass::create([
            'name' => 'Registered Practical Nurse',
            'abbreviation' => 'RPN',
            'description' => 'Registered Practical Nurse',
        ]);
        RegistrationClass::create([
            'name' => 'Registered Nurse',
            'abbreviation' => 'RN',
            'description' => 'Registered Nurse',
        ]);
        RegistrationClass::create([
            'name' => 'Nurse Practitioner',
            'abbreviation' => 'NP',
            'description' => 'Nurse Practitioner',
        ]);
        RegistrationClass::create([
            'name' => 'Graduate',
            'abbreviation' => 'Graduate',
            'description' => 'Graduate',
        ]);


    }
}
