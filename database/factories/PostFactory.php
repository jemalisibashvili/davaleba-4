<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->realText(50, 5),
        
        ];
    }
}
