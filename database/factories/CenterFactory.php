<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Center;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TradeCenter>
 */
class CenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'email' => fake()->companyEmail,
            'address' => fake()->address,
            'phone_number' => fake()->phoneNumber,
            'open_hours' => fake()->text($maxNbChars = 200),
            'center_image' => fake()->imageUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
