<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_name' => $this->faker->words(3, true), // Generates a random 3-word service name
            'service_description' => $this->faker->paragraph(), // Generates a random paragraph
            'service_price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10.00 and 1000.00
            'service_duration' => $this->faker->optional()->numberBetween(15, 240), // Optional duration between 15 and 240 minutes
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
