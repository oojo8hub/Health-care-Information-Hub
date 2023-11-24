<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\RegistrationClass;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Presenting Symptoms',
            'system_default' => true,
            'active' => true,
        ]);
        Category::create([
            'name' => 'Chronic Conditions',
            'system_default' => true,
            'active' => true,
        ]);
        Category::create([
            'name' => 'Mental Health',
            'system_default' => true,
            'active' => true,
        ]);
        Category::create([
            'name' => 'Life Cycle and Preventative Health',
            'system_default' => true,
            'active' => true,
        ]);
        Category::create([
            'name' => 'Education',
            'system_default' => true,
            'active' => true,
        ]);
        Category::create([
            'name' => 'Pandemic Resources',
            'system_default' => false,
            'active' => true,
        ]);


    }
}
