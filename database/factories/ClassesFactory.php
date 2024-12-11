<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trainers;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'start_time' => $this->faker->date(),
            'end_time' => $this->faker->date(),
            'price' => $this->faker->randomNumber(3),
            'max_participants' => $this->faker->randomNumber(2),
            'trainers_id' => $this->faker->numberBetween(1, Trainers::count()),
        ];
    }
}
