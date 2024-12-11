<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\equipments>
 */
class EquipmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'categorey' => $this->faker->jobTitle(),
            'status' => $this->faker->randomElement(['active', 'maintaince']),
            'purchase_date' => $this->faker->date(),
        ];
    }
}
