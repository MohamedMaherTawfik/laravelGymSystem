<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Members;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payments>
 */
class PaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'members_id'=>$this->faker->numberBetween(1, Members::count()),
            'amount'=>$this->faker->numberBetween(1,1000),
            'payment_date'=>$this->faker->date(),
            'status'=>$this->faker->randomElement(['paid','unpaid']),
            'payment_method'=>$this->faker->randomElement(['cash','card']),
        ];
    }
}
