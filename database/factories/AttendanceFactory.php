<?php

namespace Database\Factories;

use App\Models\Members;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'members_id' => $this->faker->numberBetween(1, Members::count()),
            'date'=> $this->faker->date(),
            'time_in'=> $this->faker->time(),
            'time_out'=> $this->faker->time(),
        ];
    }
}
