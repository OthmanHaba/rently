<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->sentence(4),
            'longDescription' => $this->faker->paragraph,
            'lat' => $this->faker->randomFloat(5, 19.5, 33.0),
            'log' => $this->faker->randomFloat(5, 9.0, 25.0),
            'address' => $this->faker->city,
            'numberOfRooms' => $this->faker->numberBetween(1, 10),
            'location_id' => \App\Models\Location::factory(),
            'view' => $this->faker->randomElement(['beach' , 'city' , 'mounten']),
            'status' => $this->faker->randomElement(['onHold', 'available' , 'rented']),
        ];
    }
}
