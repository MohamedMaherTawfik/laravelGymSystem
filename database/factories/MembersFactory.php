<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plans;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Members>
 */
class MembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'status' => fake()->randomElement(['active', 'inactive']),
            'membership_type' => fake()->randomElement(['monthly', 'yearly']),
            'plans_id' => fake()->numberBetween(1, Plans::count()),
        ];
    }
}
