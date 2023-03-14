<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->numberBetween(0,1),
            'title' => $this->faker->name(),
            'active' => $this->faker->boolean(),
            'thumbnail' => $this->faker->imageUrl(),
        ];
    }
}
