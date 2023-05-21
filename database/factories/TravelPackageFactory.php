<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelPackage>
 */
class TravelPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->slug(),
            'location' => fake()->sentence(),
            'about' => fake()->sentence(),
            'featured_event' => fake()->sentence(),
            'language' => fake()->sentence(),
            'foods' => fake()->sentence(),
            'departured_date' => fake()->dateTime(),
            'duration' => fake()->sentence(),
            'type'=> fake()->sentence(),
            'price' => fake()->randomNumber(7, true)
        ];
    }
}
