<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
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
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->realTextBetween(100, 200),
            'status' => $this->faker->boolean(),
            'create_year' => $this->faker->year
        ];
    }
}
