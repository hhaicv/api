<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_model'=>fake()->name(),
            'car_image'=>fake()->imageUrl(),
            'manufacturer'=>fake()->text(),
            'price'=>fake()->numberBetween(400, 500000),
            'year'=>fake()->year()
        ];
    }
}
