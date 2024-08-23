<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // did some research on faker and was able to use these as my fake values https://github.com/fzaninotto/Faker
        return [
            'title' => fake()->word,
            'condition' => fake()->randomElement($array = array('mint', 'near mint', 'very good', 'good', 'fair', 'poor')),
            'description' => fake()->text($maxNbChars = 150)  ,
            'availability' => fake()->randomElement($array = array('ready to collect', 'en route to trade center')),
            'category' => fake()->randomElement($array = array('clothing', 'electronics', 'furniture', 'entertainment', 'other')),
            'item_image' => fake()->imageUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

// return [
//     'name' => fake()->word,
//     'email' => fake()->companyEmail,
//     'address' => fake()->address,
//     'phone_number' => fake()->phoneNumber,
//     'open_hours' => fake()->text($maxNbChars = 200),
//     'created_at' => now(),
//     'updated_at' => now(),
// ];