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
    public function definition(): array
    {
        return [
            // Assuming `Category_id` is not auto-generated, otherwise remove this line
            'Category_id' => $this->faker->unique()->randomNumber(), // Generate a unique ID
            'Category_name' => $this->faker->word(), // Random single word for the name
            'Category_description' => $this->faker->paragraph(), // Random description
            'Category_picture' => $this->faker->imageUrl(640, 480, 'categories', true, 'Category Image'), // Random image URL
        ];
    }
}
