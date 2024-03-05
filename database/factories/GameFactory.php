<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'rental_price' => $this->faker->randomFloat(2, 5, 100),
            'photo' => $this->faker->imageUrl(),
            'category_id' => $this->faker->numberBetween(1, 8),  // Example for generating a random image URL
            'year' => $this->faker->year(2000, 2020),
            'user_id' => $this->faker->numberBetween(1, 1),
        ];
    }
}
