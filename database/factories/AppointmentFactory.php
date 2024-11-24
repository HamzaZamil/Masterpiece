<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Generates a user if not provided
            'service_id' => Service::factory(), // Generates a service if not provided
            'pet_id' => Pet::factory(), // Generates a pet if not provided
            'appointment_date' => $this->faker->date(),
            'appointment_time' => $this->faker->time(),
            'appointment_location' => $this->faker->randomElement(['van', 'home']),
            'appointment_status' => $this->faker->randomElement(['accepted', 'pending', 'declined', 'done', 'in_progress']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
