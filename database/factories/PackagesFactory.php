<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Packages>
 */
class PackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        return [
            'name' => $faker->name(),
            'start_date' => $faker->date(),
            'end_date' => $faker->date(),
            'price' => $faker->randomNumber(5, true),
            'max_capacity' => $faker->randomDigitNot(2),
            // 'destination_id' => $faker->numberBetween(0, 20)
        ];
    }
}
