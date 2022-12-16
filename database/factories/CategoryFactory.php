<?php

namespace Database\Factories;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'name' => $faker->word(),
            // 'slug' => $faker->slug(),
            // 'is_active' => $faker->boolean(),
            'name' => $this->faker->word(3),
            'slug' => $this->faker->text(13),
            'is_active' => $this->faker->boolean(),

        ];
    }
}
