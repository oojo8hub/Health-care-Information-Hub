<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'Test',
            'name' => 'Test Test',
            'email' => 'test@test.com',
            'password' => Hash::make('11111111'),
        ]);

        User::create([
            'first_name' => 'Promise',
            'last_name' => 'Ojo',
            'name' => 'Promise Ojo',
            'email' => 'oojo123@upei.ca',
            'password' => Hash::make('11111111'),
        ]);

        User::create([
            'first_name' => 'Aaron',
            'last_name' => 'Adams',
            'name' => 'Aaron Adams',
            'email' => 'adadams@upei.ca',
            'password' => Hash::make('11111111'),
        ]);

        User::create([
            'first_name' => 'Wenjing',
            'last_name' => 'Luo',
            'name' => 'Wenjing Luo',
            'email' => 'wluo2@upei.ca',
            'password' => Hash::make('11111111'),
        ]);

        User::create([
            'first_name' => 'Gail',
            'last_name' => 'Macartney',
            'name' => 'Gail Macartney',
            'email' => 'gmacartney@upei.ca',
            'password' => Hash::make('Summer16'),
        ]);


        User::factory(15)->create();
    }
}
