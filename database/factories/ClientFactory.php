<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition()
    {
        return [
            'clientname' => fake()->name,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'website' => fake()->url,
            'city_id' => fake()->numberBetween(1, 20),
            'address' => fake()->address(),
            'active' => fake()->numberBetween(0, 1),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}

