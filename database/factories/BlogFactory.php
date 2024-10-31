<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> 1,
            'title_en' => $this->faker->sentence(4),
            'title_kh' => $this->faker->sentence(4),
            'description_en' => $this->faker->sentence(1000),
            'description_kh' => $this->faker->sentence(1000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
