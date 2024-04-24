<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DynamicPricing>
 */
class DynamicPricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'property_id'   => factory(App\Models\Property::class)->create()->id, // Adjust with the actual Property model and namespace
            'date'          => $this->faker->date(),
            'pricePerNight' => $this->faker->randomFloat(2, 50, 500), // Adjust the range according to your requirements
            'pricePerWeek'  => $this->faker->randomFloat(2, 200, 1500), // Adjust the range according to your requirements
            'pricePerMonth' => $this->faker->randomFloat(2, 800, 5000),
        ];
    }
}
