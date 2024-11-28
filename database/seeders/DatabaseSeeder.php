<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create(); // Creates 10 users
        \App\Models\Pet::factory(10)->create(); // Creates 10 users
        \App\Models\Category::factory(10)->create(); // Creates 10 users
        \App\Models\Pet::factory()->count(10)->create();
        \App\Models\Appointment::factory()->count(10)->create();

    }
}
