<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Guide;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GuideSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        Guide::create([
            'topic' => 'Abdominal Pain',
            'slug' => str_slug('Abdominal Pain'),
            'content' => 'Propose a relevant differential diagnosis for a patient presenting with abdominal pain, based on the history and physical exam findings',
            'published' => true,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ]);

        Guide::create([
            'topic' => 'Obesity',
            'slug' => str_slug('Abortion medication training'),
            'published' => true,
            'content' => 'List the potential target organ damage associated with obesity',
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ]);

        Guide::create([
            'topic' => 'Breast concerns',
            'slug' => str_slug('Breast concerns'),
            'published' => true,
            'content' => 'List the risk factors for breast cancer and screening',
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ]);

        for ($i = 0; $i < 100; $i++) {
            $topic = $i . $this->faker->text(20);
            Guide::create([
                'topic' => $topic,
                'slug' => str_slug($topic),
                'content' => $this->faker->text(),
                'published' => rand(0,1) == 1,
                'user_id' => User::all()->random()->id,
                'category_id' => Category::all()->random()->id,
            ]);
        }

    }
}
