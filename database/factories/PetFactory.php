<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Automatically create and associate a User
            'pet_name' => $this->faker->firstName(), // Random name for the pet
            'pet_type' => $this->faker->randomElement(['cat', 'dog']), // Randomly select cat or dog
            'pet_breed' => $this->faker->word(), // Random word for the breed
            'pet_age' => $this->faker->numberBetween(0, 20), // Random age between 0 and 20
            'pet_weight' => $this->faker->numberBetween(1, 50), // Random weight between 1 and 50 kg
            'pet_gender' => $this->faker->randomElement(['male', 'female']), // Randomly select male or female
            'pet_image' => $this->faker->imageUrl(640, 480, 'animals', true, 'pets'), // Random image URL
            'pet_medical_history' => $this->faker->text(200), // Random medical history text
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
