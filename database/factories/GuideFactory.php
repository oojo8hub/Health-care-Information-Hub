<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class GuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $topic = $this->faker->text(10);

        return [
            'topic' => $topic,
            'slug' => str_slug($topic),
            'content' => $this->faker->text(),
            'published' => rand(0, 1) == 1,
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }

}
