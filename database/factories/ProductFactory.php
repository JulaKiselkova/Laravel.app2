<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'price' => $this->faker->randomNumber(),
            'img' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(),
            'content' => $this->faker->realTextBetween(100,200)
        ];
    }
}
